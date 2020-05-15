<?php
include("./vue/V_listDroitAdmin.php");

function getDroit()
{
	require_once("./modele/M_listeDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = getListeDroit();
	return $ligne;
}

function supprDroit($struId, $baseId)
{
	require_once("./modele/M_listeDroitAdmin.php");
	require_once("./modele/M_connectBdd.php");
	supprDroitModele($struId, $baseId);
}
?>