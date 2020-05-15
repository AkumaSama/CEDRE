<?php
if(!isset($_SESSION['idbase']))
{
	$_SESSION['idbase'] = $_GET['idbase'];
}

if(isset($_POST['modifBase']))
{
	$libelle = $_POST['libelleBase'];
	$user = $_POST['userBase'];
	$nom = $_POST['nomBase'];
	$port = $_POST['portBase'];
	$mdpPost = $_POST['mdpBase'];
	$mdpEncode = base64_encode($mdpPost);
	$AppliId = $_POST['idApp'];
	$TypeId = $_POST['idType'];

	modifBase($libelle, $user, $nom, $port, $mdpEncode, $AppliId, $TypeId, $_SESSION['idbase']);
	header("Location: ./index.php?menu=liste des bases&success=true");
}

$base = getBaseById($_SESSION['idbase']);
$libelleBase = $base['base_libelle'];
$userBase = $base['base_userBDD'];
$nomBase = $base['base_nomBDD'];
$portBase = $base['base_port'];
$mdp = $base['base_mdp'];
$idAppli = $base['app_id'];
$idTbdd = $base['tbdd_id'];

$ligne = getListApp();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des bases&error=".$ligne);
}

$ligne2 = getListType();
if(!is_array($ligne2))
{
	header("Location: ./index.php?menu=liste des bases&error=".$ligne2);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Modification de base</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification de base</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des bases" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=modification de base" method="POST">
				<p><label>Libelle </label> <input type="text" name="libelleBase" value="<?php echo $libelleBase;?>"></p>
				<p><label>User </label> <input type="text" name="userBase" value="<?php echo $userBase;?>"></p>
				<p><label>Nom de base</label> <input type="text" name="nomBase" value="<?php echo $nomBase;?>"></p>
				<p><label>Port de base</label> <input type="text" name="portBase" value="<?php echo  $portBase;?>"></p>
				<?php $mdp = base64_decode($mdp);?>
				<p><label>Mot de passe de l'user</label> <input type="text" name="mdpBase" value="<?php echo $mdp;?>"></p>
				<p><label>Application</label> <select name="idApp">
					<?php
					foreach($ligne as $data)
					{
						$appId = $data['app_id'];
						$appSigle = $data['app_sigle'];

						?><option value="<?php echo $appId;?>" <?php if($idAppli == $appId) echo "selected";?>><?php echo $appSigle;?></option><?php
					}
					?>
				</select></p>
				<p><label>Type de base</label> <select name="idType">
					<?php
					foreach($ligne2 as $data2)
					{
						$typeId = $data2['tbdd_id'];
						$typeLibelle = $data2['tbdd_libelle'];

						?><option value="<?php echo $typeId;?>" <?php if($idTbdd == $typeId) echo "selected";?>><?php echo $typeLibelle;?></option><?php
					}
					?>
				</select></p>
				<p><button type="submit" class="btn btn-primary" name="modifBase">Modifier</button></p>
			</form>	
		</div>
	</div>
</section>