<?php
//affichage de la page au utilisateur
include("./vue/V_listeDesServeursAdmin.php");

//fonction qui appelle la liste des serveurs
function getServeur()
{
	require_once("./modele/M_listeServeurAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListeServeur();
	return $ligne;
}

function supprServ($id)
{
	require_once("./modele/M_listeServeurAdmin.php");
	require_once("./modele/M_connectBdd.php");
	deleteServ($id);
}
?>