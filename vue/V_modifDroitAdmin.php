<?php
if(!isset($_SESSION['struid']) && !isset($_SESSION['baseid'])){
	$_SESSION['struid'] = $_GET['struid'];
	$_SESSION['baseid'] = $_GET['baseid'];
}


if(isset($_POST['modifDroit']))
{
	$idStru = $_POST['struId'];
	$idBase = $_POST['baseId'];

	if(isset($_POST['execPerm']))
	{
		$execPerm = true;
	} else {
		$execPerm = false;
	}

	if(isset($_POST['modifPerm']))
	{
		$modifPerm = true;
	} else {
		$modifPerm = false;
	}

	setDroitForId($_SESSION['struid'], $_SESSION['baseid'], $idStru, $idBase,  $execPerm, $modifPerm);
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
	header("Location: ./index.php?menu=liste des droits&error=".$ligne2);
}

$droit = getDroitById($_SESSION['struid'], $_SESSION['baseid']);
if(!is_array($droit))
{
	header("Location: ./index.php?menu=liste des droits&error=".$droit);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Modification de droit</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification de droit</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des droits" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=modification de droit" method="POST">
				<p><label>Structure</label>
					<select name="struId">
						<?php
						foreach($ligne as $data)
						{
							$idStructure = $data['stru_id'];
							$libelle = $data['stru_libelle'];

							?><option value="<?php echo $idStructure;?>" <?php if($idStructure == $_SESSION['struid']) echo "selected"; ?>><?php echo $libelle;?></option><?php
						}
						?>
					</select>
				</p>
				<p><label>Base de donnée</label>
					<select name="baseId">
						<?php
						foreach($ligne2 as $data)
						{
							$idBase = $data['base_id'];
							$libelle = $data['base_libelle'];

							?><option value="<?php echo $idBase;?>" <?php if($idBase == $_SESSION['baseid']) echo "selected"; ?>><?php echo $libelle;?></option><?php
						}
						?>
					</select>
				</p>
				<?php
				$exec = $droit['tperm_execution'];
				$modif = $droit['tperm_modification'];
				?>
				<p><input id="check1" type="checkbox" name="execPerm" value="true" onclick="checkBox()" <?php if($exec) echo "checked";?>> <label for="check1">Permission d'éxecution</label></p>
				<p><input id="check2" type="checkbox" name="modifPerm" value="true" disabled <?php if($modif) echo "checked";?>> <label for="check2">Permission de modification</label></p>
				<p><input class="btn btn-primary" type="submit" name="modifDroit" value="Modifier"></p>
			</form>
			<script type="text/javascript">checkBox()</script>
		</div>
	</div>
</section>