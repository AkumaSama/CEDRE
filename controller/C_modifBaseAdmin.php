<?php
include("./vue/V_modifBaseAdmin.php");

function getListApp()
{
	require_once("./modele/M_modifBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getAppList();
	return $ligne;
}

function getListType()
{
	require_once("./modele/M_modifBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getTypeBase();
	return $ligne;
}

function getBaseById($id)
{
	require_once("./modele/M_modifBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getBaseId($id);
	return $ligne;
}

function modifBase($libelle, $user, $nom, $port, $mdp, $appId, $typeId, $idPost)
{
	require_once("./modele/M_modifBaseAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setDroitById($idPost, $libelle, $user, $nom, $port, $mdp, $appId, $typeId);
}
?>