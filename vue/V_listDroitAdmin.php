<?php
if (isset($_POST['supprDroit'])) {
	$baseId = $_POST['idBase'];
	$struId = $_POST['idStru'];

	supprDroit($struId, $baseId);
	header("Location: ./index.php?menu=liste des droits&success=true");
}

$ligne = getDroit();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des droits&error=".$ligne);
}

unset($_SESSION['struid']);
unset($_SESSION['baseid']);
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des droits</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des droits</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter des droits"><button class="btn btn-primary">Ajouter des droits</button></a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
		<?php
		foreach ($ligne as $data) {
			$struId = $data['stru_id'];
			$baseId = $data['base_id'];
			$baseLibelle = $data['base_libelle'];
			$strucLibelle = $data['stru_libelle'];
			$permExec = $data['tperm_execution'];
			$permModif = $data['tperm_modification'];

			if($permExec == 1)
			{
				$permExec = "oui";
			} else {
				$permExec = "non";
			}

			if($permModif == 1)
			{
				$permModif = "oui";
			} else {
				$permModif = "non";
			}
			?>
			<form action="./index.php?menu=liste des droits" method="POST">
				<p><span><?php echo "groupe : ".$strucLibelle." --> base : ".$baseLibelle." | exécution : ".$permExec." modification : ".$permModif;?></span> <a href="./index.php?menu=modification de droit&baseid=<?php echo $baseId;?>&struid=<?php echo $struId;?>" class="btn btn-primary">Modifier</a> <button type="submit" name="supprDroit" class="btn btn-primary">Supprimer</button></p>
				<input type="hidden" name="idStru" value="<?php echo $struId;?>"><input type="hidden" name="idBase" value="<?php echo $baseId;?>">
			</form>
			<?php
		}
		?>
		</div>
	</div>
</section>