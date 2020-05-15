<?php
if(!isset($_SESSION['idtype'])) {
	$_SESSION['idtype'] = $_GET['idtype'];
}

if(isset($_POST['modifType'])) {
	$libelleType = $_POST['libelle'];
	$modelleRequeteType = $_POST['modele'];

	modifType($_SESSION['idtype'], $libelleType, $modelleRequeteType);
	header("Location: ./index.php?menu=liste des types&success=true");
}

$data = getTypeById($_SESSION['idtype']);
if(!is_array($data))
{
	header("Location: ./index.php?menu=liste des types&error=".$data);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Modification d'un type de base de donnée</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification d'un type de base de donnée</p>
		</div>
	</div>
	<!--bouton d'ajout de type de base de donnée-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des types" class="btn btn-primary">retour</a></p>
		</div>
	</div>
	<!--liste des types de base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			$id = $data['tbdd_id'];
			$libelle = $data['tbdd_libelle'];
			$modele = $data['tbdd_modeleRequete'];
			?>
			<form action="./index.php?menu=modification de type" method="POST">
				<input type="hidden" name="idType" value="<?php echo $id;?>">
				<p><label>Libelle :</label> <input type="text" name="libelle" value="<?php echo $libelle; ?>"></p>
				<p><label>Modele de requête :</label> <input type="text" name="modele" value="<?php echo $modele;?>"></p>
				<p><button class="btn btn-primary" name="modifType">Modifier</button></p>
			</form>
		</div>
	</div>
</section>