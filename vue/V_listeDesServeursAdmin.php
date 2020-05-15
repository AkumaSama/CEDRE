<?php
if(isset($_POST['supprServ']))
{
	$idServ = $_POST['idServ'];

	supprServ($idServ);
	header("Location: ./index.php?menu=liste des serveurs&success=true");
}

$ligne = getServeur();
if(!is_array($ligne))
{
	header("Location: ./index.php?menu=liste des serveurs&error=".$ligne);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Liste des serveurs</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Liste des serveurs</p>
		</div>
	</div>
	<!--Bouton redirigeant a la page d'ajout de serveur-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter un serveur"><button class="btn btn-primary">Ajouter un serveur</button></a></p>
		</div>
	</div>
	<!--Affichage des serveurs-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			foreach($ligne as $data)
			{
				$id = $data['serv_id'];
				$description = $data['serv_commentaire'];
				$nomDNS = $data['serv_nomDNS'];
				?>
				<form action="./index.php?menu=liste des serveurs" method="POST">
					<input type="hidden" name="idServ" value="<?php echo $id;?>">
					<p><span><?php echo $nomDNS;?></span> <a href="./index.php?menu=modification d un serveur&idserv=<?php echo $id;?>" class="btn btn-primary">Modifier</a> <button class="btn btn-primary" name="supprServ">Supprimer</button></p>
					<p><label><u>Commentaire :</u></label></p>
					<p><textarea cols="50" rows="3" name="commentaireServ" readonly><?php echo $description;?></textarea></p>
				</form>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php
if(isset($_SESSION['idserv']))
{
	unset($_SESSION['idserv']);
}
?>