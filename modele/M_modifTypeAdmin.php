<?php
function typeById($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('SELECT * FROM type_BDD WHERE tbdd_id = ?');
		$req->execute(array($id));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setTypeById($id, $libelle, $modele)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('UPDATE type_BDD SET tbdd_libelle = ? , tbdd_modeleRequete = ? WHERE tbdd_id = ?');
		$req->execute(array($libelle, $modele, $id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>