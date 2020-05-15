<?php
//fonction d'ajout a la base de donnée
function addAppli($sigle, $desc)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("INSERT INTO application (app_sigle, app_description) VALUES (?,?)");
		$req->execute(array($sigle, $desc));
	} catch(PDOException $e){
		return $e->getMessage();
	}
	
	
}
?>