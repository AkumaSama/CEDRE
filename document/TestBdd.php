<?php
if(!isset($_REQUEST['menu'])) {
	$_REQUEST['menu'] = "CEDRE";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<!--META-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--TITRE DE LA PAGE-->
	<title>CEDRE | <?php if($_REQUEST['menu'] == "CEDRE") {echo "accueil";} else { echo $_REQUEST['menu'];}?></title>
	<!--LINK CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./public/style.css">
</head>
<body>
	<!--LINK JS-->
	<script type="text/javascript" src="./public/index.js"></script>
	<!--LINK JS BOOTSTRAP V-4.4.1-->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!--CONTENT-->
	<div class="container-fluid">
		<?php
		//inclusion du code de la page V_menu.php
		include("./vue/V_menu.php");
		//selon le chamin d'acces demandÃ© par l'utilisateur la page s'affiche en consÃ©quence
		/*switch ($_REQUEST['menu']) {
			//demande de la page d'accueil section utilisateur
			case 'CEDRE':
					include("./vue/V_accueil.php");
				break;
			//demande de la page catalogue section utilisateur
			case 'catalogue':
					include("./controller/C_requete.php");
				break;
			//demande de la page ajout d'une requete section utilisateur
			case 'ajouter une requete':
					include("./controller/C_ajout.php");
				break;
			//demande de la page ajout d'une application section admin
			case 'ajouter une application':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addAppliAdmin.php");
					}
				break;
			//demande de la page ajouter un serveur section admin
			case 'ajouter un serveur':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addServeurAdmin.php");
					}
				break;
			//demande de la page ajouter un administrateur section admin
			case 'ajouter un administrateur':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addAdmin.php");
					}
				break;
			//demande de la page ajout d'un type section admin
			case 'ajouter un type':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addTypeAdmin.php");
					}
				break;
			//demande de la page ajout d'une base section admin
			case 'ajouter une base':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addBaseAdmin.php");
					}
				break;
			//demande de la page ajout des droits section admin
			case 'ajouter des droits':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_addDroitAdmin.php");
					}
				break;
			//demande de la page liste des applications section admin
			case 'liste des applications':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listeDesAppAdmin.php");
					}
				break;
			//demande de la page liste des serveurs section admin
			case 'liste des serveurs':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listeDesServeursAdmin.php");
					}
				break;
			//demande de la page liste des administrateurs section admin
			case 'liste des administrateurs':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listeDesAdmins.php");
					}
				break;
			//demande de la page liste des types section admin
			case 'liste des types':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listeDesTypesAdmin.php");
					}
				break;
			//demande de la page liste des bases section admin
			case 'liste des bases':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listeDesBasesAdmin.php");
					}
				break;
			//demande de la page liste des droits section admin
			case 'liste des droits':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_listDroitAdmin.php");
					}
				break;
			//demande de la page statisque section admin
			case 'statistique':
					//Si l'utilisateur ne possÃ¨de pas les droits admin
					if(!!isset($_SESSION['admin'])) {
						include("./controller/C_errorAdmin.php");
					} else {
						include("./controller/C_statAdmin.php");
					}
				break;
			//Si la page n'a pas Ã©tÃ© trouver affiche "erreur 404"
			default:
				?>
				<section class="container">
					<div class="row">
						<div class="col">
							<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Erreur</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p id="p-titre"><span id="titre">CEDRE</span> - Erreur de permission</p>
						</div>
					</div>
					<div class="row rounded" id="bg-grey">
						<div class="col">
							<p class="text-center">Erreur 404 page not found.</p>
						</div>
					</div>
				</section>
				<?php
				break;
		}*/
require("./modele/M_connectBdd.php");

$db = getBdd("db2", "ramsese-db.in.ac-rouen.fr", "cramsese", "ramsrouen8", "RAMW");
$req = $db->prepare("select uairne,uaidnp,uaidnc,uaiadr,uaicpl,uailoc from db2irams.v_uai where acadco='21' and natuco like '3%'");
$req->execute();
var_dump($req->fetchAll());
		?>
	</div>
</body>
</html>