<?php
function getListTypeBase()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM type_BDD');
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function deleteType($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('DELETE FROM type_BDD WHERE tbdd_id = ?');
		$req->execute(array($id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>