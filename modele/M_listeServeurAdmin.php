<?php
//fonction qui retourne la liste de tous les serveur en base
function getListeServeur()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM serveur_BDD");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}	
}

function deleteServ($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("DELETE FROM serveur_BDD WHERE serv_id = ?");
		$req->execute(array($id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}	
}
?>