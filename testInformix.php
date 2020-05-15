<?php
try {
	$db = new PDO(//);
	$req = $db->prepare("SELECT COUNT(*) as count FROM uti");
	$req->execute();
	header ("Content-type: application/json");
	$jsonInformix = fopen("testJSONinformix.json", "w") or die ("unable to open file");
	fwrite($jsonInformix, json_encode($req->fetchAll(PDO::FETCH_CLASS)));
	fclose($jsonInformix);
} catch(PDOException $e) {
	echo $e->getMessage();
}?>