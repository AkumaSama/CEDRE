<?php
include("./vue/V_listeDesAdmins.php");

function getAdmin()
{
	require_once("./modele/M_listeDesAdmins.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListeAdmin();
	return $ligne;
}

function supprAdmin($id)
{
	require_once("./modele/M_listeDesAdmins.php");
	require_once("./modele/M_connectBdd.php");
	supprAdminModele($id);
}
?>