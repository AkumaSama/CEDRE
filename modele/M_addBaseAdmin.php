<?php
function addBaseBdd($libelle, $user, $nom, $app, $port, $mdpBase, $type, $server)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("INSERT INTO base (base_libelle, base_userBDD, base_nomBDD, base_port, base_mdp, app_id, tbdd_id, serv_id) VALUES (?,?,?,?,?,?,?,?)");
		$req->execute(array($libelle, $user, $nom, $port, $mdpBase, $app, $type, $server));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getAppli()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM application");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
	
}

function getTypeBase()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM type_BDD");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

//fonction de récupération de la liste des serveurs pour la balise select
function getServ()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM serveur_BDD");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e){
		return $e->getMessage();
	}

}
?>