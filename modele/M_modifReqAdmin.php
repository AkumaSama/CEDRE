<?php
function reqById($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM requete WHERE req_id = ?");
		$req->execute(array($id));
		$ligne = $req->fetch();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function app()
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("SELECT * FROM application");
		$req->execute();
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

function setReq($id, $titre, $req, $desc, $appId)
{
	require_once("./modele/M_classPdoStatementToString.php");
	require("./config/configBdd.php");
	try {
		$strReq = new toString($req);
		$requete = $strReq->__toString();
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare("UPDATE requete SET req_titre = ? , req_commande = ? , req_description = ? , app_id = ? , req_dateDerniereMaj = CURRENT_DATE() WHERE req_id = ?");
		$req->execute(array($titre, $requete, $desc, $appId, $id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>