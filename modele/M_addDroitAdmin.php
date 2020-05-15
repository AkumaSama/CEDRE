<?php

function addDroitBase($idBase, $idStru, $exec, $modif)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		if($exec)
		{
			if($modif)
			{
				$req = $db->prepare("INSERT INTO droit (base_id, stru_id, tperm_execution, tperm_modification) VALUES (?,?,true,true)");
			} else {
				$req = $db->prepare("INSERT INTO droit (base_id, stru_id, tperm_execution, tperm_modification) VALUES (?,?,true,false)");
			}
		} else {
			$req = $db->prepare("INSERT INTO droit (base_id, stru_id, tperm_execution, tperm_modification) VALUES (?,?,false,false)");
		}
		$req->execute(array($idBase, $idStru));
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getStructureList()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM structure");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function getBaseList()
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
?>