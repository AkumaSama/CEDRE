<?php
function getServList()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM serveur_bdd');
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function appById($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM application WHERE app_id = ?');
		$req->execute(array($id));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setApp($id, $sigle, $desc)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('UPDATE application SET app_sigle = ? , app_description = ? WHERE app_id = ?');
		$req->execute(array($sigle, $desc, $id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>