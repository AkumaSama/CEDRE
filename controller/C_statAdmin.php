<?php
include("./vue/V_statAdmin.php");

function nbRequete()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$nb = getNbRequete();
	return $nb;
}

function nbApp()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$nb = getNbApp();
	return $nb;
}

function nbServeur()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$nb = getNbServeur();
	return $nb;
}

function nbTypeBase()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$nb = getNbTypeBase();
	return $nb;
}

function nbBase()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$nb = getNbBase();
	return $nb;
}

function getRequestMoreExec()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getReqMoreExec();
	return $ligne;
}

function getRequestDate()
{
	require_once("./modele/M_statAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getReqDate();
	return $ligne;
}
?>