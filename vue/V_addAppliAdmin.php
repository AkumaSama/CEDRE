<?php
//Si le bouton d'ajout est pressé
if(isset($_POST['addAppli']))
{
	//Passage des variables au controller
	$sigleAppli = htmlspecialchars($_POST['sigleAddAppli']);
	$descAppli = htmlspecialchars($_POST['descAddAppli']);
	//$servAppli = htmlspecialchars($_POST['servAddAppli']);
	addApp($sigleAppli, $descAppli);
	header("Location: ./index.php?menu=liste des applications&success=true");
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter une application</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter une application</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des applications" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<!--formulaire d'ajout de l'application a la base-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter une application" method="POST">
				<p><label>Sigle de l'application<span class="obligatoire">*</span></label></p><p><input type="text" name="sigleAddAppli" required></p>
				<p><label>Description<span class="obligatoire">*</span></label></p><p><textarea name="descAddAppli" cols="50" rows="5" required></textarea></p>
				<p><input type="submit" name="addAppli" class="btn btn-primary" value="Ajouter l'application"></p>
			</form>
		</div>
	</div>
</section>