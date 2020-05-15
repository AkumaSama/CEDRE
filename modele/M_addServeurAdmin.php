<?php
//fonction qui ajout le serveur a la base de donnée
function addServeur($commentaire, $nomDNS)
{
	require_once("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("INSERT INTO serveur_BDD (serv_commentaire, serv_nomDNS) VALUES (?,?)");
		$req->execute(array($commentaire, $nomDNS));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>