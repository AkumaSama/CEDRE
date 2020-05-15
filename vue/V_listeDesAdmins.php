<?php
if (isset($_POST['supprAdmin'])) {
	$id = $_POST['supprAdmin'];
	supprAdmin($id);
	header("Location: ./index.php?menu=liste des administrateurs&success=true");
}

$ligne = getAdmin();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des administrateurs&error=".$ligne);
}

?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des administrateurs</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des administrateurs</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter un administrateur"><button class="btn btn-primary">Ajouter un administrateur</button></a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			foreach($ligne as $data)
			{
				$id = $data['uti_id'];
				$utilogin = $data['uti_login'];
				?>
				<form action="./index.php?menu=liste des administrateurs" method="POST">
					<p><span><?php echo $utilogin;?></span> <button type="submit" name="supprAdmin" class="btn btn-primary" value="<?php echo $id;?>">Supprimer</button></p>
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>