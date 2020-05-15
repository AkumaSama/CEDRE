<?php
include("./vue/V_addAdmin.php");

function addAdmin($id)
{
	require_once("./modele/M_addAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$result = addAdminModele($id);
	return $result;
}

function getUserNonAdmin()
{
	require_once("./modele/M_addAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListeUserNonAdmin();
	return $ligne;
}
?>