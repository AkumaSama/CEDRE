<?php
if(isset($_POST['supprApp']))
{
	$idApp = $_POST['idApp'];

	supprApp($idApp);
	header("Location: ./index.php?menu=liste des applications&success=true");
}

//Récupération de la liste
$ligne = getApp();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des applications&error=".$ligne);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des applications</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des applications</p>
		</div>
	</div>
	<!--bouton d'ajout d'application dans la base-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter une application"><button class="btn btn-primary">Ajouter une application</button></a></p>
		</div>
	</div>
	<!--affichage des applications-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			//affichage ligne par ligne des applications
			foreach($ligne as $data)
			{
				$id = $data['app_id'];
				$sigle = $data['app_sigle'];
				$desc = $data['app_description'];
				?>
				<form action="./index.php?menu=liste des applications" method="POST">
					<input type="hidden" name="idApp" value="<?php echo $id;?>">
					<p><span><?php echo $sigle; ?></span> <a href="./index.php?menu=modification d application&idapp=<?php echo $id;?>" class="btn btn-primary">Modifier</a> <button type="submit" name="supprApp" value="<?php echo $id; ?>" class="btn btn-primary">Supprimer</button></p>
					<p><label><u>Description :</u></label></p>
					<p><textarea cols="50" rows="3" readonly><?php echo $desc;?></textarea></p>
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
if(isset($_SESSION['idapp']))
{
	unset($_SESSION['idapp']);
}
?>