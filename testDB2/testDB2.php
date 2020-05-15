<?php
function jsonToCSV($jfilename, $cfilename, $i)
{
    if(($json = file_get_contents($jfilename)) == false)
        die('Error reading json file to csv...');
    $data = json_decode($json, true);
    $fp = fopen($cfilename, 'w');
    $header = false;
    foreach ($data as $row)
    {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header, ";");
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $row), ";");
        $i++;
    }
    fclose($fp);
    return $i;
}

function jsonToTXT($jfilename, $txtfilename, $i)
{
    if(($json = file_get_contents($jfilename)) == false)
        die('Error reading json file to txt...');
    $data = json_decode($json, true);
    $fp = fopen($txtfilename, 'w');
    $header = false;
    foreach ($data as $row)
    {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header, "|");
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $row), "|");
        $i++;
    }
    fclose($fp);
    return $i;
}


try {
	$i=0;
	$db = new PDO(//);
	$req = $db->prepare("select uairne,uaidnp,uaidnc,uaiadr,uaicpl,uailoc from db2irams.v_uai");//where acadco='21' and natuco like '3%'
	
	$req->execute();
	
	$jsonFile = "testJSONDB2.json";
	$csvFile = "testCSVDB2.csv";
	$txtFile = "testTXTDB2.txt";

	$jsonDB2 = fopen($jsonFile, "w") or die ("unable to open file");
	$fetchedRows = $req->fetchAll(PDO::FETCH_CLASS);
	//printf ("Taille : %d<br>", sizeof ($fetchedRows));
	$jsonData = json_encode($fetchedRows,JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_UNICODE);
	//printf ("%s<br>", json_last_error_msg());
	fwrite($jsonDB2, $jsonData);
	fclose($jsonDB2);

	$i = jsonToCSV($jsonFile, $csvFile, $i);
	$i = jsonToTXT($jsonFile, $txtFile, $i);
	echo 'Successfully converted json to csv file. <a href="' . $csv_filename . '" target="_blank">Click here to open it.</a>';
	echo $i."/ 100";
	
	$contentFile = file_get_contents($txtFile);
	$contentFileUtf8 = utf8_decode($contentFile);
	$contentFileUtf8 = str_replace('"', '', $contentFileUtf8);
	$txtRewrite = fopen($txtFile, "w");
	fwrite($txtRewrite, $contentFileUtf8);
	fclose($txtRewrite);

	$contentFile = file_get_contents($csvFile);
	$contentFileUtf8 = utf8_decode($contentFile);
	$csvRewrite = fopen($csvFile, "w");
	fwrite($csvRewrite, $contentFileUtf8);
	fclose($csvRewrite);

	$contentFile = file_get_contents($jsonFile);
	$contentFileUtf8 = utf8_decode($contentFile);
	$contentFileUtf8 = str_replace('\u0000', '', $contentFileUtf8);
	$contentFileUtf8 = str_replace('\u0001', '', $contentFileUtf8);
	$jsonRewrite = fopen($jsonFile, "w");
	fwrite($jsonRewrite, $contentFileUtf8);
	fclose($jsonRewrite);


} catch(PDOException $e) {
	echo $e->getMessage();
}
?>
