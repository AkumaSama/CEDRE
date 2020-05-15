<?php
if(isset($_POST['supprType'])) {
	$idType = $_POST['idType'];

	supprType($idType);
	header("Location: ./index.php?menu=liste des types&sucess=true");
}

//Récupération des types
$ligne = getTypeBase();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des types&error=".$ligne);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des types de base de donnée</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des types de base de donnée</p>
		</div>
	</div>
	<!--bouton d'ajout de type de base de donnée-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter un type"><button class="btn btn-primary">Ajouter un type</button></a></p>
		</div>
	</div>
	<!--liste des types de base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			//Affichage des types de base
			foreach($ligne as $data)
			{
				$id = $data['tbdd_id'];
				$libelle = $data['tbdd_libelle'];
				$modele = $data['tbdd_modeleRequete'];
				?>
				<form action="./index.php?menu=liste des types" method="POST">
					<input type="hidden" name="idType" value="<?php echo $id;?>">
					<p><label>Libelle :</label> <span><?php echo $libelle; ?></span></p>
					<p><label>Modele de requête :</label> <span><?php echo $modele;?></span></p>
					<p><a href="./index.php?menu=modification de type&idtype=<?php echo $id;?>" class="btn btn-primary">Modifier</a> <button class="btn btn-primary" name="supprType">Supprimer</button></p>
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
if(isset($_SESSION['idtype']))
{
	unset($_SESSION['idtype']);
}
?>