<?php
//affichage de la page à l'utilisateur
include("./vue/V_addAppliAdmin.php");

//Fonction d'appel a l'ajout d'application
function addApp($sigle, $desc)
{
	require_once("./modele/M_addAppliAdmin.php");
	require_once("./modele/M_connectBdd.php");
	addAppli($sigle, $desc);
}
?>