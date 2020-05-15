<?php
include("./vue/V_modifAppAdmin.php");

function getServ()
{
	require_once("./modele/M_modifAppAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getServList();
	return $ligne;
}	

function getAppById($id)
{
	require_once("./modele/M_modifAppAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = appById($id);
	return $ligne;
}

function modifApp($id, $sigle, $desc)
{
	require_once("./modele/M_modifAppAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setApp($id, $sigle, $desc);
}
?>