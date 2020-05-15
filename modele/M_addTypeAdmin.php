<?php
function addTypeBdd($libelle, $modeleRequete)
{
	require_once("./config/configBdd.php");
	try {
		$db = getbdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("INSERT INTO type_BDD (tbdd_libelle, tbdd_modeleRequete) VALUES (?,?)");
		$req->execute(array($libelle, $modeleRequete));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>