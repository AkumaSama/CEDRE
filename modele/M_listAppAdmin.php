<?php
function deleteApp($id)
{
	require("./config/configBdd.php");
	try {
		$db = getBdd($typeBdd, $host, $userBdd, $mdp, $base);
		$req = $db->prepare('DELETE FROM application WHERE app_id = ?');
		$req->execute(array($id));
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}
?>