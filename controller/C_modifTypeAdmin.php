<?php
include("./vue/V_modifTypeAdmin.php");

function getTypeById($id)
{
	require_once("./modele/M_modifTypeAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = typeById($id);
	return $ligne;
}

function modifType($id, $libelle, $modele)
{
	require_once("./modele/M_modifTypeAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setTypeById($id, $libelle, $modele);
}
?>