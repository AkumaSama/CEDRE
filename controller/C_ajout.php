<?php
//affichage de la page ajout pour l'utilisateur
include("./vue/V_ajout.php");

//fonction pour appelé l'ajout de la requete 
function addRequete($titre, $req, $desc, $appli, $param1, $param2, $param3, $param4, $param5)
{
	require_once("./modele/M_ajout.php");
	require_once("./modele/M_connectBdd.php");

	addRequest($titre, $req, $desc, $appli, $param1, $param2, $param3, $param4, $param5);
}

//fonction pour appelé la récupération de la liste des applications
function getListeApp()
{
	require_once("./modele/M_ajout.php");
	require_once("./modele/M_connectBdd.php");

	$ligne = getAppList();
	return $ligne;
}	
?>