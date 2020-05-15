<?php
function getNbRequete()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT count(req_id) FROM requete");
		$req->execute();
		return $req->fetch();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getNbApp()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT count(app_id) FROM application");
		$req->execute();
		return $req->fetch();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getNbServeur()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT count(serv_id) FROM serveur_BDD");
		$req->execute();
		return $req->fetch();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getNbTypeBase()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT count(tbdd_id) FROM type_BDD");
		$req->execute();
		return $req->fetch();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getNbBase()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT count(base_id) FROM base");
		$req->execute();
		return $req->fetch();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getReqMoreExec()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT req_commande, req_titre, req_nombreExec FROM requete ORDER BY req_nombreExec DESC LIMIT 10");
		$req->execute();
		return $req->fetchAll();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getReqDate()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT req_commande, req_titre, req_dateDerniereExec FROM requete ORDER BY req_dateDerniereExec ASC LIMIT 10");
		$req->execute();
		return $req->fetchAll();
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

?>