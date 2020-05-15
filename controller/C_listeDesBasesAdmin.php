<?php
include("./vue/V_listeDesBasesAdmin.php");

function getBase()
{
	require_once("./modele/M_listeBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListBase();
	return $ligne;
}

function supprBaseById($idBase)
{
	require_once("./modele/M_listeBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	supprBase($idBase);
}

function getIfBaseAsDroit($idBase)
{
	require_once("./modele/M_listeBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	return ifBaseBaseAsDroit($idBase);
}
?>