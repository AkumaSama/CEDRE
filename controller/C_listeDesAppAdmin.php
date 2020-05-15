<?php
//affichage de la page au utilisateur
include("./vue/V_listeDesAppAdmin.php");

//fonction d'appel a la liste des applications
function getApp()
{
	require_once("./modele/M_ajout.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getAppList();
	return $ligne;
}

function supprApp($id)
{
	require_once("./modele/M_listAppAdmin.php");
	require_once("./modele/M_connectBdd.php");
	deleteApp($id);
}
?>