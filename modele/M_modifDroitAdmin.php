<?php
function getDroit($struId, $baseId)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT tperm_execution, tperm_modification FROM droit WHERE stru_id = ? AND base_id = ?");
		$req->execute(array($struId, $baseId));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setDroit($struIdPost, $baseIdPost, $struId, $baseId, $tpermExec, $tpermModif)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		if($tpermExec) {
			if($tpermModif) {
				$req = $db->prepare("UPDATE droit SET stru_id = ? , base_id = ? , tperm_execution = 1 , tperm_modification = 1 WHERE stru_id = ? AND base_id = ?");
			} else {
				$req = $db->prepare("UPDATE droit SET stru_id = ? , base_id = ? , tperm_execution = 1 , tperm_modification = 0 WHERE stru_id = ? AND base_id = ?");
			}
		} else {
			$req = $db->prepare("UPDATE droit SET stru_id = ? , base_id = ? , tperm_execution = 0 , tperm_modification = 0 WHERE stru_id = ? AND base_id = ?");
		}
		
		$req->execute(array($struId, $baseId, $struIdPost, $baseIdPost));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>