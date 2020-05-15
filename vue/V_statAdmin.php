<section class="container">
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Administration <span class="grey">/</span> Statistique</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Statistique</p>
		</div>
	</div>
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<br>
			<p><b><u>Nombre de requête:</u></b> <span><?php echo nbRequete()[0]; ?></span></p>
			<p><b><u>Nombre d'application:</u></b> <span><?php echo nbApp()[0]; ?></span></p>
			<p><b><u>Nombre de serveur:</u></b> <span><?php echo nbServeur()[0]; ?></span></p>
			<p><b><u>Nombre de type de base différent:</u></b> <span><?php echo nbTypeBase()[0]; ?></span></p>
			<p><b><u>Nombre de base:</u></b> <span><?php echo nbBase()[0]; ?></span></p>
			<p><b><u>Les 10 requêtes les plus exécuté:</u></b></p>
			<?php
			$ligne = getRequestMoreExec();
			$i = 0;
			foreach($ligne as $row) {
				$titre = $row['req_titre'];
				$requete = $row['req_commande'];
				$nbExec = $row['req_nombreExec'];

				if($i != 0) echo "<hr>";?>

				<p><label><?php echo $titre;?></label></p>
				<p><textarea cols="70" rows="2" readonly><?php echo $requete;?></textarea></p>
				<p><label><?php echo "Exécuté ".$nbExec." fois !"; ?></label></p>
			<?php $i++;
			}
			?>
			<hr>
			<p><b><u>Les 10 requêtes exécuté datant le plus:</u></b></p>
			<?php
			$ligne2 = getRequestDate();
			$i = 0;
			foreach($ligne2 as $row2) {
				$titre = $row2['req_titre'];
				$requete = $row2['req_commande'];
				$date = $row2['req_dateDerniereExec'];

				if($i != 0) echo "<hr>";?>

				<p><label><?php echo $titre;?></label></p>
				<p><textarea cols="70" rows="2" readonly><?php echo $requete;?></textarea></p>
				<p><label><?php echo "Dernière exécution le ".$date." !"; ?></label></p>
			<?php $i++;
			}
			?>

		</div>
	</div>
</section>