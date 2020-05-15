<!--Si le bouton ajouter est cliqué-->
<?php
if(isset($_POST['ajout']))
{
	//récupération des données
	$titre = htmlspecialchars($_POST['titre']);
	$requete = htmlspecialchars($_POST['requete']);
	$desc = htmlspecialchars($_POST['description']);
	$appli = htmlspecialchars($_POST['appli']);
	//si les paramètre ne sont pas rempli
	if(isset($_POST['param1'])) {
		$param1 = htmlspecialchars($_POST['param1']);
	} else {
		$param1 = NULL;
	}
	if(isset($_POST['param2'])) {
		$param2 = htmlspecialchars($_POST['param2']);
	} else {
		$param2 = NULL;
	}
	if(isset($_POST['param3'])) {
		$param3 = htmlspecialchars($_POST['param3']);
	} else {
		$param3 = NULL;
	}
	if(isset($_POST['param4'])) {
		$param4 = htmlspecialchars($_POST['param4']);
	} else {
		$param4 = NULL;
	}
	if(isset($_POST['param5'])) {
		$param5 = htmlspecialchars($_POST['param5']);
	} else {
		$param5 = NULL;
	}
	//Ajout de la requete a la base
	addRequete($titre, $requete, $desc, $appli, $param1, $param2, $param3, $param4, $param5);
	header("Location: ./index.php?menu=catalogue&success=true");
}

$ligne = getListeApp();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=catalogue&error=".$ligne);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Requête <span class="grey">/</span> Ajouter une requete</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter une requête</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=catalogue" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<!--Formulaire d'ajout d'une requête a la base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter une requete" method="POST">
				<p><label>Titre de la requete<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="titre" required></p>
				<p><label>Requete SQL<span class="obligatoire">*</span></label></p>
				<p><textarea rows="3" cols="80" name="requete" required></textarea></p>
				<p><label>Description de la requete</label></p>
				<p><textarea name="description" rows="5" cols="80"></textarea></p>
				<p><label>Application<span class="obligatoire">*</span></label>
				<select name="appli" required>
					<option selected></option>
					<?php
					foreach($ligne as $data)
					{
						$id = $data['app_id'];
						$sigle = $data['app_sigle'];

						?><option value="<?php echo $id;?>"><?php echo $sigle;?></option><?php
					}
					?>
				</select></p>
				<!--<p><label>Critère de restriction</label></p>
				<p><input type="text" name="param1"><span> | </span><input type="text" name="param2"></p>
				<p><input type="text" name="param3"><span> | </span><input type="text" name="param4"></p>
				<p><input type="text" name="param5"></p>-->
				<p><input type="submit" class="btn btn-primary" name="ajout"></p>
			</form>
		</div>
	</div>
</section>