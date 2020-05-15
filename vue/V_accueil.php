<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded">Accueil <span class="grey">/</span></p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Catalogue Exécuteur De Requête</p>
		</div>
	</div>
	<!--1er rectangle avec les boutons Catalogue et Ajouter une requête-->
	<div class="row">
		<div class="col-6">
			<div class="bg-blue rounded">
				<p class="title"><span class="fa fa-search" aria-hidden="true"></span> Requête</p>
				<div class="border-left border-blue rounded-bottom">
					<p><a href="./index.php?menu=catalogue"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Catalogue</button></a></p>
					<p><a href="./index.php?menu=ajouter une requete"><button class="btn btn-light"><span class="fa fa-plus" aria-hidden="true"></span> Ajouter une requête</button></a></p>
					<br>
				</div>
			</div>
		</div>
		<!--2eme rectangle avec les boutons Liste des serveurs, liste des applications, liste des types de base, liste des bases de donnée, liste des droits, liste des administrateurs, statistique-->
		<div class="col-6">
			<div class="bg-blue rounded">
				<p class="title"><span class="fa fa-user" aria-hidden="true"></span> Administration</p>
				<div class="border-left border-blue rounded-bottom">
					<p>
						<a href="./index.php?menu=liste des serveurs"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des serveurs</button></a>
						<a href="./index.php?menu=liste des applications"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des applications</button></a>
						<a href="./index.php?menu=liste des bases"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des types de base</button></a>
						<a href="./index.php?menu=liste des types"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des bases de donnée</button></a>
						<a href="./index.php?menu=liste des droits"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des droits</button></a><?php
						if($superAdmin) {?>
						<a href="./index.php?menu=liste des administrateurs"><button class="btn btn-light"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des administrateurs</button></a>
						<?php }?><a href="./index.php?menu=statistique"><button class="btn btn-light"><span class="fa fa-signal" aria-hidden="true"></span> Statistique</button></a>
					</p>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>