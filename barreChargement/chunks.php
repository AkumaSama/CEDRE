<?php
ob_start(); //on met en place l'output buffering
header("Transfer-Encoding: chunked");
header("Content-Encoding: none");

function sendChunk($chunk)
{
    $chunk = str_pad($chunk."|", 4096); //4096 correspond à la valeur de la directive output_buffering du php.ini
    printf("%x\r\n%s\r\n", strlen($chunk), $chunk);
    ob_flush();flush();ob_flush();flush();ob_flush();flush();
    usleep (10000);
}

/* un petit exemple d'utilisation avec un tableau fictif */
$handle = opendir ('/etc');
while (false!== ($retTab['newVals'][] = readdir ($handle))) {}
$nbreqIns = count($retTab['newVals']);
reset ($retTab);

$idreq=0;
while (list ($k, $v) = each ($retTab['newVals'])){
  sendChunk(sprintf ("insmax:%d;sql:%d", $nbreqIns, $idreq++));
 // (...) On fait ce qu'on a à faire sur la ligne du tableau
}
?>
