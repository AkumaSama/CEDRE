<?php
function getAppList()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM application');
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
		$req = $db->prepare('SELECT * FROM type_BDD');
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
}

function getBaseId($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM base WHERE base_id = ?');
		$req->execute(array($id));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setDroitById($idPost, $libelle, $user, $nom, $port, $mdpBase, $appId, $typeId)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('UPDATE base SET base_libelle = ? , base_userBDD = ? , base_nomBDD = ? , base_port = ? , base_mdp = ? , app_id = ? , tbdd_id = ? WHERE base_id = ?');
		$req->execute(array($libelle, $user, $nom, $port, $mdpBase, $appId, $typeId, $idPost));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>