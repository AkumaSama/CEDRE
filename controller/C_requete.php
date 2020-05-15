<?php
//Affichage de la page catalogue à l'utilisateur
include("./vue/V_requete.php");

//fonction qui appele la liste des requêtes par permission
function getRequestByPermission ($user, $exec) {
	require_once("./modele/M_requete.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getRequest($user, $exec);
	return $ligne;
}

//fonction qui appele la liste des bases par requête
function getBaseByRequest($idRequest)
{
	require_once("./modele/M_requete.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getBase($idRequest);
	return $ligne;
}

//fonction qui appele la liste les requêtes par permission selon la recherche
function searchByRequest($recherche, $user, $exec)
{
	require_once("./modele/M_requete.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = search($recherche, $user, $exec);
	return $ligne;
}

function supprReq($id)
{
	require_once("./modele/M_requete.php");
	require_once("./modele/M_connectBdd.php");
	deleteRequestById($id);
}
?>