<?php
//affichage de la page à l'utilisateur
include("./vue/V_addServeurAdmin.php");

//fonction qui appel l'ajout de serveur a la base
function addServ($servCommentaire, $nomDns)
{
	require_once("./modele/M_addServeurAdmin.php");
	require_once("./modele/M_connectBdd.php");
	addServeur($servCommentaire, $nomDns);
}
?>