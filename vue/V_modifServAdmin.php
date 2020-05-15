<?php
if(!isset($_SESSION['idserv'])) {
	$_SESSION['idserv'] = $_GET['idserv'];
}

if(isset($_POST['modifServ'])) {

	$dns = $_POST['nomDnsServ'];
	$com = $_POST['commentaireServ'];

	modifServ($_SESSION['idserv'], $dns, $com);
	header("Location: ./index.php?menu=liste des serveurs&success=true");
}

$data = getServById($_SESSION['idserv']);
if(!is_array($data))
{
	header("Location: ./index.php?menu=liste des serveurs&error=".$data);
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Modification d'un serveur de base de donnée</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Modification d'un serveur de base de donnée</p>
		</div>
	</div>
	<!--bouton d'ajout de type de base de donnée-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=liste des serveurs" class="btn btn-primary">retour</a></p>
		</div>
	</div>
	<!--liste des types de base de donnée-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<?php
			$id = $data['serv_id'];
			$nomDns = $data['serv_nomDNS'];
			$commentaire = $data['serv_commentaire'];
			?>
			<form action="./index.php?menu=modification d un serveur" method="POST">
				<p><label>nom DNS :</label> <input type="text" name="nomDnsServ" value="<?php echo $nomDns; ?>"></p>
				<p><label class="align-top">Commentaire :</label> <textarea cols="50" rows="4" name="commentaireServ"><?php echo $commentaire;?></textarea></p>
				<p><button class="btn btn-primary" name="modifServ">Modifier</button></p>
			</form>
		</div>
	</div>
</section>