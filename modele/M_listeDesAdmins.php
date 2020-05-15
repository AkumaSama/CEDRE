<?php
function getListeAdmin()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM utilisateur WHERE uti_estAdmin IS true");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}

function supprAdminModele($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("UPDATE utilisateur SET uti_estAdmin = false WHERE uti_id = ?");
		$req->execute(array($id));
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}
?>