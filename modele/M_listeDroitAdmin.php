<?php
function getListeDroit()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT droit.stru_id, droit.base_id, stru_libelle, base_libelle, tperm_execution, tperm_modification FROM structure INNER JOIN droit ON structure.stru_id = droit.stru_id INNER JOIN base ON droit.base_id = base.base_id");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function supprDroitModele($struId, $baseId)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("DELETE FROM droit WHERE stru_id = ? AND base_id = ?");
		$req->execute(array($struId, $baseId));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>