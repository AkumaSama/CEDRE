
<?php
if(isset($_POST['addType']))
{
	$type = htmlspecialchars($_POST['type']);
	$modele = htmlspecialchars($_POST['modele']);

	addType($type, $modele);
	header("Location: ./index.php?menu=liste des types&success=true");
}


?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter un type de base de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter un type de base de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des types" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter un type" method="POST">
				<p><label>Libelle du type<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="type" placeholder="ex: mysql, postgresql ..."></p>
				<p><label>Modele de requête<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="modele"></p>
				<p><input type="submit" name="addType" class="btn btn-primary" value="Ajouter le type"></p>
			</form>
		</div>
	</div>
</section>