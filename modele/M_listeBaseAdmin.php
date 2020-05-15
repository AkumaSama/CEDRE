<?php
function getListBase()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM base");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function supprBase($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("DELETE FROM base WHERE base_id = ?");
		$req->execute(array($id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function ifBaseBaseAsDroit($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM droit WHERE base_id = ?");
		$req->execute(array($id));
		$ligne = $req->fetchAll();
		if(count($ligne) > 0) {
			return false;
		} else {
			return true;
		}
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>