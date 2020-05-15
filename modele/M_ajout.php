<?php
//fonction d'ajout de la requete a la base de donnée
function addRequest($titre, $req, $desc, $appli, $param1, $param2, $param3, $param4, $param5)
{
	require("./config/configBdd.php");
	require_once("./modele/M_classPdoStatementToString.php");
	//transformation de la requete en string
	$strReq = new toString($req);
	$error = $strReq->__toString();
	//essai de l'éxécution de la requête, si une erreur est trouvé elle sera affiché a l'utilisateur
	try
	{
		//conenction a la base de donnée
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		//préparation de la requête
		$req = $db->prepare("INSERT INTO requete (req_titre, req_description, req_commande, req_param1, req_param2, req_param3, req_param4, req_param5, req_nombreExec, app_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$req->execute(array($titre, $desc, $error, $param1, $param2, $param3, $param4, $param5, 0, $appli));
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
	
}

//fonction pour récupéré la liste des applications
function getAppList()
{
	require("./config/configBdd.php");
	try{
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM application");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>