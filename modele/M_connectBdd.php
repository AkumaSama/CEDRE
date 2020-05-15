<?php

function getBdd($typeBdd, $host, $user, $password, $base)
{
	try
	{
		$db = new PDO($typeBdd.":host=".$host.";dbname=".$base, $user, $password);
	} catch(PDOException $e)
	{
		echo 'Connexion échouée :' . $e->getMessage();
		return;
	}
	return $db;
}
?>