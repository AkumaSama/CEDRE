<?php
//Si le bouton d'ajout est pressé cela exécute la fonction addServ()
if(isset($_POST['addServeur']))
{
	$desc = htmlspecialchars($_POST['descAddServeur']);
	$dns = htmlspecialchars($_POST['dnsAddServeur']);

	addServ($desc, $dns);
	header("Location: ./index.php?menu=liste des serveurs&success=true");
}
?>
<section class="container">
	<!--Ligne grise montrant le chemin d'acces de l'utilisateur-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Ajouter un serveur base de donnée</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Ajouter un serveur de base de donnée</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des serveurs" class="btn btn-primary">Retour</a></p>
		</div>
	</div>
	<!-- formulaire d'ajout d'un serveur a la base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=ajouter un serveur" method="POST">
				<p><label>Description<span class="obligatoire">*</span></label></p><p><textarea name="descAddServeur" cols="50" rows="5" required></textarea></p>
				<p><label>Nom DNS<span class="obligatoire">*</span></label></p><p><input type="text" name="dnsAddServeur" required></p>
				<p><input type="submit" name="addServeur" class="btn btn-primary" value="Ajouter le serveur"></p>
			</form>
		</div>
	</div>
</section>	