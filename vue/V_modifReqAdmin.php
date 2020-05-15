<?php
if(!isset($_SESSION['idreq'])){
	$_SESSION['idreq'] = $_GET['idreq'];
}


if(isset($_POST['modifReq']))
{
	$titreReq = $_POST['titreReq'];
	$descReq = $_POST['descReq'];
	$commandeReq = $_POST['comandeReq'];
	$appReq = $_POST['appReq'];

	modifReq($_SESSION['idreq'], $titreReq, $commandeReq, $descReq, $appReq);
	header("Location: ./index.php?menu=catalogue&success=true");
}

$ligne = getReqById($_SESSION['idreq']);
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=catalogue&error=".$ligne);
}

$ligne2 = getApp();
if(!is_array($ligne2))
{
	header("Location: ./index.php?menu=catalogue&error=".$ligne2);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Requête <span class="grey">/</span> Modification d'une requête</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification d'une requête</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=catalogue" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=modification de requete" method="POST">
				<?php
				$titre = $ligne['req_titre'];
				$description = $ligne['req_description'];
				$commande = $ligne['req_commande'];
				$appId = $ligne['app_id'];
				?>
				<p><label>Titre :</label> <input type="text" name="titreReq" value="<?php echo $titre;?>"></p>
				<p><label class="align-top">Commande :</label> <textarea cols="50" rows="4" name="comandeReq"><?php echo $commande;?></textarea></p>
				<p><label class="align-top">Description :</label> <textarea cols="50" rows="4" name="descReq"><?php echo $description;?></textarea></p>
				<p><label>Application :</label> <select name="appReq">
					<?php
					foreach($ligne2 as $data)
					{
						$idApp = $data['app_id'];
						$sigleApp = $data['app_sigle'];
						?><option value="<?php echo $idApp;?>" <?php if($idApp == $appId) echo "selected";?> ><?php echo $sigleApp;?></option><?php
					}
					?>
				</select></p>
				<p><button class="btn btn-primary" name="modifReq">Modifier</button></p>
			</form>
		</div>
	</div>
</section>