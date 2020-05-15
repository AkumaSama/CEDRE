<?php
include("./vue/V_modifServAdmin.php");

function getServById($id)
{
	require_once("./modele/M_modifServeurAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = servById($id);
	return $ligne;
}

function modifServ($id, $dns, $com)
{
	require_once("./modele/M_modifServeurAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setServ($id, $dns, $com);
}
?>