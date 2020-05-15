<?php
include("./vue/V_addDroitAdmin.php");

function addDroit($idBase, $idStru, $exec, $modif)
{
	require_once("./modele/M_addDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	addDroitBase($idBase, $idStru, $exec, $modif);
}

function getStru()
{
	require_once("./modele/M_addDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getStructureList();
	return $ligne;
}

function getBase()
{
	require_once("./modele/M_addDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getBaseList();
	return $ligne;
}
?>