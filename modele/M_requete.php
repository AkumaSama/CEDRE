<?php
//récupération des requête par permission
function getRequest($user, $exec)
{
	require("./config/configBdd.php");
	try
	{
		$bdd = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		if($exec)
		{
			$req = $bdd->prepare("SELECT req_id, req_titre, req_commande, req_description, app_sigle, serv_nomDNS, base_libelle, tperm_modification FROM utilisateur inner join structure on utilisateur.stru_id = structure.stru_id inner join droit on structure.stru_id = droit.stru_id inner join base on droit.base_id = base.base_id inner join application on application.app_id = base.app_id inner join serveur_BDD on base.serv_id = serveur_BDD.serv_id inner join requete on application.app_id = requete.app_id where utilisateur.uti_login = ? AND droit.tperm_execution is true");
		} else {
			return;
		}
	
		$req->execute(array($user));
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}

//récupération des base par requête selon leur application de provenance
function getBase($id)
{
	require("./config/configBdd.php");
	try {
		$bdd = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $bdd->prepare("SELECT base_id, base_userBDD FROM requete inner join application on application.app_id = requete.app_id inner join base on base.app_id = application.app_id where req_id = ?");
		$req->execute(array($id));
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}


//récupération des requêtes selon les permission et la recherche de l'utilisateur
function search($recherche, $user, $exec)
{
	require("./config/configBdd.php");
	try {
		$bdd = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		if($exec)
		{
			$req = $bdd->prepare('SELECT req_id, req_titre, req_commande, req_description, app_sigle, serv_nomDNS, base_libelle, tperm_modification FROM utilisateur inner join structure on utilisateur.stru_id = structure.stru_id inner join droit on structure.stru_id = droit.stru_id inner join base on droit.base_id = base.base_id inner join application on application.app_id = base.app_id inner join serveur_BDD on base.serv_id = serveur_BDD.serv_id inner join requete on application.app_id = requete.app_id where utilisateur.uti_login = ? AND droit.tperm_execution is true AND req_description like "%'.$recherche.'%" OR req_titre like "%'.$recherche.'" OR app_sigle LIKE "%'.$recherche.'%"');
		} else {
			return;
		}
		$req->execute(array($user));
		$ligne = $req->fetchAll();
		return $ligne;
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}

function deleteRequestById($id)
{
	require("./config/configBdd.php");
	try {
		$bdd = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $bdd->prepare('DELETE FROM requete WHERE req_id = ?');
		$req->execute(array($id));
	} catch(PDOException $e)
	{
		return $e->getMessage();
	}
}
?>