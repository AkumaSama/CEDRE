<?php
function addAdminModele($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$req = $db->prepare("UPDATE utilisateur SET uti_estAdmin = true WHERE uti_id = ?");
		$req->execute(array($id));
		return true;
	} catch(PDOException $e) 
	{
		$msgError = $e->getMessage();
		return $msgError;
	}
}

function getListeUserNonAdmin()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM utilisateur WHERE uti_estAdmin is false");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) 
	{
		return $e->getMessage();
	}
}
?>