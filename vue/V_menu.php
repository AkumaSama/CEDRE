<header class="row" id="menu-bg">
	<!--logo de l'académie-->
	<div class="col-2">
		<a href="http://www.ac-normandie.fr/"><img id="logo-academie" class=" position-absolute rounded img-fluid" src="./public/logo-normandie2.png"></a>
	</div>
	<!--Menu avec liste déroulante-->
	<div class="col">
		<div class="list-inline">
			<a href="./index.php" class="list-inline-item menu-button"><span class="fa fa-home" aria-hidden="true"></span> CEDRE</a>
			<div class="dropdown show list-inline-item">
				<a href="#" class="dropdown-toggle menu-button" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search" aria-hidden="true"></span> Requête</a>
				<div id="menu1" class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
					<a href="./index.php?menu=catalogue"><span class="fa fa-th-list" aria-hidden="true"></span> Catalogue</a><br>
					<a href="./index.php?menu=ajouter une requete"><span class="fa fa-plus" aria-hidden="true"></span> Ajouter une requete</a>
				</div>
			</div>
			<div class="dropdown show list-inline-item">
				<a href="#" class="dropdown-toggle menu-button" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user" aria-hidden="true"></span> Admin</a>
				<div id="menu2" class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
					<a href="./index.php?menu=liste des serveurs"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des serveurs</a><br>
					<a href="./index.php?menu=liste des applications"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des applications</a><br>
					<a href="./index.php?menu=liste des types"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des types de base</a><br>
					<a href="./index.php?menu=liste des bases"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des bases</a><br>
					<a href="./index.php?menu=liste des droits"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des droits</a><br><?php
					if($superAdmin) {?>
					<a href="./index.php?menu=liste des administrateurs"><span class="fa fa-th-list" aria-hidden="true"></span> Liste des administrateurs</a><br>
					<?php }?><a href="./index.php?menu=statistique"><span class="fa fa-signal" aria-hidden="true"></span> Statistique</a><br>
				</div>
			</div>
		</div>
	</div>
</header>