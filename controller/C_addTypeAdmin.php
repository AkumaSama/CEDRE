<?php
include("./vue/V_addTypeAdmin.php");

function addType($libelle, $modelRequete)
{
	require("./modele/M_addTypeAdmin.php");
	require_once("./modele/M_connectBdd.php");

	addTypeBdd($libelle, $modelRequete);
}
?>