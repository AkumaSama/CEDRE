<?php
if(isset($_POST['addBase']))
{
	$libelle = htmlspecialchars($_POST['libelleBase']);
	$user = htmlspecialchars($_POST['userBase']);
	$nomBase = htmlspecialchars($_POST['nomBase']);
	$port = htmlspecialchars($_POST['portBase']);
	$mdp = htmlspecialchars($_POST['mdpBase']);
	$app = htmlspecialchars($_POST['appBase']);
	$type = htmlspecialchars($_POST['typeBase']);
	$server = htmlspecialchars($_POST['servAddBase']);

	$mdp = base64_encode($mdp);
	addBase($libelle, $user, $nomBase, $port, $mdp, $app, $type, $server);
	header("Location: ./index.php?menu=liste des bases&success=true");
}

$ligne = getApp();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des bases&error=".$ligne);
}

$ligne2 = getListeType();
if(!is_array($ligne2))
{
	header("Location: ./index.php?menu=liste des bases&error=".$ligne2);
}

//Récupération de la liste des serveurs
$ligne3 = getListeServeur();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des applications&error=".$ligne3);
}
?>
<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter une base de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter une base de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des bases" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter une base" method="POST">
				<p><label>Libelle de base<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="libelleBase" required></p>
				<p><label>User de base<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="userBase" required></p>
				<p><label>Nom de base<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="nomBase" required></p>
				<p><label>Port de la base<span class="obligatoire">*</span></label></p>
				<p><input type="text" name="portBase" required></p>
				<p><label>Mot de passe l'user<span class="obligatoire">*</span></label></p>
				<p><input id="checkboxPSW" type="password" name="mdpBase" required> <input type="checkbox" onclick="showPassword()"> <span id="eye" class="fa fa-eye"></span></p>
				<p><label>Application<span class="obligatoire">*</span></label>
				<select name="appBase" required>
					<option selected></option>
				<?php
				foreach($ligne as $app)
				{
					$appId = $app['app_id'];
					$appSigle = $app['app_sigle'];

					?><option value="<?php echo $appId;?>"><?php echo $appSigle; ?></option><?php
				}
				?>
				</select></p>
				<p><label>Type de base<span class="obligatoire">*</span></label>
				<select name="typeBase" required>
					<option selected></option>
				<?php
				foreach($ligne2 as $type)
				{
					$tbddId = $type['tbdd_id'];
					$typeLibelle = $type['tbdd_libelle'];

					?><option value="<?php echo $tbddId;?>"><?php echo $typeLibelle; ?></option><?php
				}
				?>
				</select></p>
				<p><label>Serveur de l'application<span class="obligatoire">*</span></label> 
					<select name="servAddBase" required>
						<option selected></option>
						<?php
						//remplissage du select avec les donnée récupérer
						foreach($ligne3 as $serveur) {
							$servId = $serveur['serv_id'];
							$servDNS = $serveur['serv_nomDNS'];

							?><option value="<?php echo $servId;?>"><?php echo $servDNS; ?></option><?php
						}
						?>
					</select>
				</p>
				<p><input type="submit" name="addBase" class="btn btn-primary"></p>
			</form>
		</div>
	</div>
</section>