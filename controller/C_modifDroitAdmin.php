<?php
include("./vue/V_modifDroitAdmin.php");

function getBase()
{
	require_once("./modele/M_addDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getBaseList();
	return $ligne;
}

function getStru()
{
	require_once("./modele/M_addDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getStructureList();
	return $ligne;
}

function getDroitByid($struId, $baseId)
{
	require_once("./modele/M_modifDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getDroit($struId, $baseId);
	return $ligne;
}

function setDroitForId($struIdPost, $baseIdPost,  $idStru, $idBase, $execPerm, $modifPerm)
{
	require_once("./modele/M_modifDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setDroit($struIdPost, $baseIdPost, $idStru, $idBase,  $execPerm, $modifPerm);
}
?>