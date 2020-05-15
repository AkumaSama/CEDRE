<?php
if(!isset($_SESSION['idapp'])) {
	$_SESSION['idapp'] = $_GET['idapp'];
}

if(isset($_POST['modifApp'])) {
	$sigleApp = $_POST['sigleApp'];
	$descApp = $_POST['descApp'];

	modifApp($_SESSION['idapp'], $sigleApp, $descApp);
	header("Location: ./index.php?menu=liste des applications&success=true");
}

$ligne = getAppById($_SESSION['idapp']);
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des applications&error=".$ligne);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Modification d'une application</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification d'une application</p>
		</div>
	</div>
	<!--bouton d'ajout de type de base de donnée-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des applications" class="btn btn-primary">retour</a></p>
		</div>
	</div>
	<!--liste des types de base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=modification d application" method="POST">
				<?php
				$sigle = $ligne['app_sigle'];
				$desc = $ligne['app_description'];
				$serv = $ligne['serv_id'];
				?>
				<p><label>Sigle</label> <input type="text" name="sigleApp" value="<?php echo $sigle;?>"></p>
				<p><label>Description</label></p>
				<p><textarea cols="50" rows="4" name="descApp"><?php echo $desc;?></textarea></p>
				<p><button class="btn btn-primary" name="modifApp">Modifier</button></p>
			</form>
		</div>
	</div>
</section>