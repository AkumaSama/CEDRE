<?php
function servById($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM serveur_BDD WHERE serv_id = ?");
		$req->execute(array($id));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setServ($id, $dns, $com)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("UPDATE serveur_BDD SET serv_commentaire = ? , serv_nomDNS = ? WHERE serv_id = ?");
		$req->execute(array($com, $dns, $id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>