<?php	
$liste_BaDo = array('epp');

//

foreach ($liste_BaDo as $BaDo)
{
    echo "<li> ". strtoupper($BaDo)."...";
    echo "<br/>DSN = ".$database_dsn[$BaDo];
    echo "<br/>USER = ".$database_user[$BaDo];
    echo "<br/>PWD = ".$database_password[$BaDo]."<br/>";
    //echo ${'_database_dsn'.$BaDo};
    //break;
    try {
        $dbh = new PDO($database_dsn[$BaDo],$database_user[$BaDo],$database_password[$BaDo]);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
        echo "Erreur de connexion : ";
        echo $exception->getMessage();
        exit;
    }
    switch ($BaDo) {
        case "epp":
        case "e3p":
        case "agora":
        case "agape76":
        case "agape27":
        case "agapepri76":
        case "agapepri27":
            $sql = "SELECT COUNT(*) FROM uti";
            break;
    }
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    if ($stmt === false)
    {
        echo "NOK";
    }
    else
    {
        echo "OK";
        echo "<br/>".var_dump($stmt->fetchAll());
        $dbh=null;
    }
    echo "</li>";
}
echo "</u>";
echo "Fin des tests de connexion <br/>";
?>
