<?php
include("./vue/V_listeDesTypeAdmin.php");

function getTypeBase()
{
	require_once("./modele/M_listeTypeAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListTypeBase();
	return $ligne;
}

function supprType($id)
{
	require_once("./modele/M_listeTypeAdmin.php");
	require_once("./modele/M_connectBdd.php");
	deleteType($id);
}
?>