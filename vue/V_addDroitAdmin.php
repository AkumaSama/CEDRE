<?php
if(isset($_POST['ajoutDroit']))
{
	$idStru = $_POST['idStru'];
	$idBase = $_POST['idBase'];

	if(isset($_POST['execPerm']))
	{
		$execPerm = $_POST['execPerm'];
	} else {
		$execPerm = false;
	}

	if(isset($_POST['modifPerm']))
	{
		$modifPerm = $_POST['modifPerm'];
	} else {
		$modifPerm = false;
	}

	addDroit($idBase, $idStru, $execPerm, $modifPerm);
	header("Location: ./index.php?menu=liste des droits&success=true");
}

$ligne = getStru();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des droits&error=".$ligne);
}

$ligne2 = getBase();
if(!is_array($ligne2))
{
	header("Location: ./index.php?menu=liste des droits&error=".$ligne);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter des droits</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter des droits</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des droits" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter des droits" method="POST">
				<p><label>Groupe/Structure<span class="obligatoire">*</span></label> <select class="idStru" name="idStru" required>
					<option selected></option>
					<?php
					foreach($ligne as $data)
					{
						$id = $data['stru_id'];
						$libelle = $data['stru_libelle'];
						?>
						<option value="<?php echo $id;?>"><?php echo $libelle;?></option>
						<?php

					}
					?>
				</select></p>
				<p><label>Base<span class="obligatoire">*</span></label> <select name="idBase" required>
					<option selected></option>
					<?php
					foreach($ligne2 as $data)
					{
						$id = $data['base_id'];
						$libelle = $data['base_libelle'];
						?>
						<option value="<?php echo $id;?>"><?php echo $libelle;?></option>
						<?php
					}
					?>
				</select></p>
				<p><input id="check1" type="checkbox" name="execPerm" value="true" onclick="checkBox()"> <label for="check1">Permission d'éxecution</label></p>
				<p><input id="check2" type="checkbox" name="modifPerm" value="true" disabled> <label for="check2">Permission de modification</label></p>
				<p><input class="btn btn-primary" type="submit" name="ajoutDroit" value="Ajouter"></p>
			</form>
		</div>
	</div>
</section>