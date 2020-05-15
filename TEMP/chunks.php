<?php
ob_start(); //on met en place l'output buffering
header("Transfer-Encoding: chunked");
header("Content-Encoding: none");

	//fonction d'envoie de morceau pour la progress bar
function sendChunk($chunk)
{
    $chunk = str_pad($chunk."|", 4096); //4096 correspond Ã  la valeur de la directive output_buffering du php.ini
    printf("%x\r\n%s\r\n", strlen($chunk), $chunk);
    ob_flush();flush();ob_flush();flush();ob_flush();flush();
}

$params = json_decode(file_get_contents('php://input'),true);
$typeFichier = $params['typeFichier'];
$idBase = (int) $params['idBase'];
$idReq = (int) $params['idReq'];
switch($typeFichier) {
	case "csv":
	  $delimiter = ';';	
	  break;
	case "txt":
	  $delimiter = '|';
	  break;
	default:
	  $delimiter = "";
	  break;
}

require("../modele/M_connectBdd.php");
require("../config/configBdd.php");

	//r�cuperation de la requ�te
$dbLocal = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
$getRequest = $dbLocal->prepare("SELECT req_commande, req_titre FROM requete WHERE req_id = ?");
$getRequest->execute(array($idReq));
$requeteResult = $getRequest->fetch(PDO::FETCH_NUM);
$titre = $requeteResult[1];
$requete = $requeteResult[0];

$getBase = $dbLocal->prepare("SELECT * FROM base inner join type_BDD on base.tbdd_id = type_BDD.tbdd_id inner join serveur_BDD on base.serv_id = serveur_BDD.serv_id WHERE base_id = ?");
$getBase->execute(array($idBase));
$base = $getBase->fetch();

$getNbExec = $dbLocal->prepare("SELECT req_nombreExec FROM requete WHERE req_id = ?");
$getNbExec->execute(array($idReq));
$nbExec = (int) $getNbExec->fetch()[0];

$updateRequeteStat = $dbLocal->prepare("UPDATE requete SET req_nombreExec = ? , req_dateDerniereExec = CURRENT_DATE() WHERE req_id = ?");
$updateRequeteStat->execute(array($nbExec+1, $idReq));

    //connection PDO
if($base['tbdd_modeleRequete'] == "informix") {
	$db = new PDO($base['tbdd_modeleRequete'].":host=".$base['serv_nomDNS']."; database=".$base['base_nomBDD']."; server=EPP_BO;", $base['base_userBDD'], base64_decode($base['base_mdp']));
} else {
	$db = new PDO($base['tbdd_modeleRequete'].";HOSTNAME=".$base['serv_nomDNS'].";PORT=".$base['base_port'].";DATABASE=".$base['base_nomBDD'].";", $base['base_userBDD'], base64_decode($base['base_mdp']));
}
    //requete a effectué
$sql = $requete;	

    //regex pour récupérer le nombre de ligne max
$sqlcount = preg_replace ("#(select) (.*) (from.*)#iU", "\\1 count(*) \\3", $sql);

    //récupération du nombre max de ligne
$reqcount = $db->prepare ($sqlcount);
$reqcount->execute();
$count = $reqcount->fetch(PDO::FETCH_NUM)[0];

    //récupération des lignes et leur contenue
$req = $db->prepare($sql);
$req->execute();

    //nom des fichiers
$jsonFile = $titre.".json";
$resultFile = $titre.".".$typeFichier;

	//ouvrir le fichier json en Ã©criture (w)
$jsonDB2 = fopen($jsonFile, "w") or die ("unable to open file");
	//ouvrir le fichier csv en Ã©criture (w)
if($typeFichier !== "json") $resultFileDB2 = fopen($resultFile, "w") or die ("unable to open file");


	//Ecrire dans le fichier json : "["
fwrite($jsonDB2, "[");

$i = 0;
$j = 0;
$idreq = 0;
$header = false;

switch (true) {
        case ($count <=100): $pas = 1; break;
        case ($count <=1000): $pas = 10; break;
        case ($count <=10000): $pas = 100; break;
        case ($count <=100000): $pas = 1000; break;
        case ($count <=1000000): $pas = 10000; break;
}

	//pour chaque ligne on l'�crit dans les fichiers voulu
while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
	
		//�criture de la virgule en d�but de ligne si $i est diff�rent de 0
	if($i !== 0) {
		fwrite($jsonDB2, ",");
	}

		//ecrire dans le fichier json_encode ($row)
	fwrite($jsonDB2, json_encode($row, JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_UNICODE));

	if($typeFichier !== "json") {
		//Ã©crire la ligne dans le csv
	if (empty($header))
        {
            $header = array_keys($row);
	    fwrite ($resultFileDB2, utf8_decode(implode ($header, $delimiter)."\n"));
            $header = array_flip($header);

		//compteur pour la virgule
	    $i++;
        }
	fwrite ($resultFileDB2, utf8_decode(implode ($row, $delimiter)."\n"));
	} else {
	    $i++;
	}
	
		//mise a jour de la barre de chargement tous les ($j == ($count % $pas))
   	if ($j == ($count % $pas)) {	
		//Mettre Ã  jour la barre de progression
		sendChunk(sprintf ("insmax:%d;sql:%d", $count, $idreq++));
        	$j = 0;
    	} else {
        	$idreq++;
    	}
    		//compteur de $pas
	$j++;
}//fin while ($row = $req->fetch(PDO::FETCH_ASSOC))

	//Remplissage finale de la progressbar
sendChunk(sprintf ("insmax:%d;sql:%d", $count, $idreq - 1));

	//Ecrire dans le fichier json : ']'
fwrite($jsonDB2, "]");

	//fermer tout (fichiers et connexion)
if($typeFichier !== "json") fclose($resultFileDB2);
fclose($jsonDB2);

if($typeFichier == "json") $resultFile = $jsonFile;

sendChunk (sprintf ("#csvFile:%s;jsonFile:%s;", $resultFile, $jsonFile));
?>
