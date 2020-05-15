<?php
if(isset($_POST['addAdmin'])) {
	$id = $_POST['user'];
	$result = addAdmin($id);
	if($result == true)
	{
		header("Location: ./index.php?menu=liste des administrateurs&success=true");
	} else {
		header("Location: ./index.php?menu=liste des administrateurs&error=".$result);
	}
}

$ligne = getUserNonAdmin();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des administrateurs&error=".$ligne);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter un administrateur</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter une administrateur</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des administrateurs" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter un administrateur" method="POST">
				<select name="user">
					<option selected></option>
					<?php
					foreach ($ligne as $data) {
						$id = $data['uti_id'];
						$utilogin = $data['uti_login'];
						?>
						<option value="<?php echo $id;?>"><?php echo $utilogin;?></option>
						<?php
					}
					?>
				</select><br><br>
				<input type="submit" name="addAdmin" class="btn btn-primary">
			</form>
		</div>
	</div>
</section>