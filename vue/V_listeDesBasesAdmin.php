<?php
if(isset($_POST['supprBase']))
{
	$idBase = $_POST['idBase'];
	echo $idBase;
	supprBaseById($idBase);
	header("Location: ./index.php?menu=liste des bases&success=true");
}

$ligne = getBase();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des bases&error=".$ligne);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des bases de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des bases de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter une base"><button class="btn btn-primary">Ajouter une base de donnée</button></a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			foreach($ligne as $data)
			{
				$id = $data['base_id'];
				$libelle = $data['base_libelle'];

				?>
				<form action="./index.php?menu=liste des bases" method="POST">
					<input type="hidden" name="idBase" value="<?php  echo $id;?>">
					<p><label><?php echo $libelle; ?></label> <a href="./index.php?menu=modification de base&idbase=<?php echo $id;?>" class="btn btn-primary">Modifier</a> 
						<?php if(getIfBaseAsDroit($id)) { ?><button type="submit" class="btn btn-primary" name="supprBase" value="suppr">Supprimer</button>
				<?php } else { echo " <label>Veuillez supprimer le/les droits affilié à cette base pour pouvoir la supprimer </label>"; } ?></p>
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
if(isset($_SESSION['idbase']))
{
	unset($_SESSION['idbase']);
}
?>