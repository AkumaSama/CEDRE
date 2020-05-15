<?php
include("./vue/V_modifReqAdmin.php");

function getReqById($id)
{
	require_once("./modele/M_modifReqAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = reqByid($id);
	return $ligne;
}

function getApp()
{
	require_once("./modele/M_modifReqAdmin.php");
	require_once("./modele/M_connectBdd.php");
	$ligne = app();
	return $ligne;
}

function modifReq($id, $titre, $req, $desc, $appId)
{
	require_once("./modele/M_modifReqAdmin.php");
	require_once("./modele/M_connectBdd.php");
	setReq($id, $titre, $req, $desc, $appId);
}
?>