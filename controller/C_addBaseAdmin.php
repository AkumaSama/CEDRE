<?php
include("./vue/V_addBaseAdmin.php");

function addBase($libelle, $user, $nom, $port, $mdp, $app, $type, $server)
{
	require_once("./modele/M_addBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");

	addBaseBdd($libelle, $user, $nom, $app, $port, $mdp,  $type, $server);
}

function getApp()
{
	require_once("./modele/M_addBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");

	$ligne = getAppli();
	return $ligne;
}

function getListeType()
{
	require_once("./modele/M_addBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");

	$ligne = getTypeBase();
	return $ligne;
}

//Fonction d'appel a l'affichage des serveurs'
function getListeServeur()
{
	require_once("./modele/M_addBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");

	$ligne = getServ();
	return $ligne;
}
?>