<?php
if(isset($_POST['supprReq']))
{
	supprReq($_POST['idReq']);
	header("Location: ./index.php?menu=catalogue&success=true");
}
?>
<section class="container">
	<!--Ligne grise montrant le chemain de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="bg-grey" class="rounded"><a href="./index.php">Accueil</a> <span class="grey">/</span> Requête <span class="grey">/</span> Catalogue de requete</p>
		</div>
	</div>
	<!--Positionnement de l'utilisateur sur l'application-->
	<div class="row">
		<div class="col">
			<p id="p-titre"><span id="titre">CEDRE</span> - Catalogue</p>
		</div>
	</div>
	<!--bouton pour acceder a la page d'ajout d'une requête-->
	<div class="row">
		<div class="col">
			<p><a href="./index.php?menu=ajouter une requete"><button class="btn btn-primary">Ajouter une requete</button></a></p>
		</div>
	</div>
	<!--Barre de recherche selon les permissions de l'utilisateur-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
			<form action="./index.php?menu=catalogue" method="POST">
				<input type="text" name="recherche" class="align-middle w-25" placeholder="application, description, titre" required>
				<button class="btn btn-primary">Rechercher <span class="fa fa-search" aria-hidden="true"></span></button>
				<a href="./index.php?menu=catalogue" class="btn btn-primary"><span class="fa fa-remove"></span></a>
			</form>
		</div>
	</div>
	<hr>
	<!--Zone d'affichage des requêtes selon les permissions de l'utilisateur-->
	<div class="row rounded" id="bg-grey">
		<div class="col">
		<?php
		//si le bouton de recherche est utilisé
		if(isset($_POST['recherche']))
		{
			//variable de test
			$user = "tthierry";
			$exec = true;
			//récupération de la liste des requêtes selon la recheche
			$ligne = searchByRequest($_POST['recherche'], $user, $exec);
			//Si la requete retourne des lignes
			if(isset($ligne))
			{
				//Affichage de la liste
				$i = 0;
				foreach($ligne as $data)
				{
					//récupération des données
					$id = $data['req_id'];
					$titre = $data['req_titre'];
					$req = $data['req_commande'];
					$desc = $data['req_description'];
					$sigleApp = $data['app_sigle'];
					$base = $data['base_libelle'];
					$perm_modif = $data['tperm_modification'];

					//remplacement de caractère mal encodé par MySQL
					$req = str_replace("&quot;", '"', $req);
					$req = str_replace("&amp;", '&', $req);
					$desc = str_replace("&quot;", '"', $desc);
					$desc = str_replace("&amp;", '&', $desc);
					?>
					<!--affichage des données-->
					<form method="POST" action="./index.php?menu=catalogue">
						<?php if($i != 0) echo '<hr>'; $i++ ?>
						<input type="hidden" name="idReq" value="<?php echo $id;?>">
						<p>
							<label><?php echo $titre;?></label> 
							<button type="button" class="btn btn-primary" onclick="deployRequest(<?php echo $id; ?>)" id="btnDeploy<?php echo $id; ?>">
								<span class="fa fa-chevron-down" id="spanButtonDeploy<?php echo $id; ?>"></span>
							</button>
						</p>
						<p>
							<label id="lblRequete<?php echo $id;?>" class="d-none align-top">Requete</label>
						</p>
						<p>
							<textarea cols="80" rows="10" id="textareaReq<?php echo $id;?>" class="d-none" disabled readonly><?php echo $req; ?></textarea>
						</p>
						<p>
							<label id="lblDesc<?php echo $id;?>" class="d-none align-top">Description</label>
						</p>
						<p>
							<textarea cols="50" rows="3" id="textareaDesc<?php echo $id;?>" class="d-none" disabled readonly><?php echo $desc; ?></textarea>
						</p>
						<p>
							<label class="d-none" id="lblApp<?php echo $id;?>">Application :</label> <input type="text" value="<?php echo $sigleApp;?>" readonly disabled id="inputApp<?php echo $id;?>" class="d-none">
						</p>
						<p>
							<button type="button" class="btn btn-primary d-none" id="btnExec<?php echo $id;?>" onclick="deployExec(<?php echo $id; ?>)">Exécuté 
								<span class="fa fa-chevron-down" id="spanButtonReq<?php echo $id; ?>"></span>
							</button> 
							<?php
							if($perm_modif == 1)
							{
								?>
								<a href="./index.php?menu=modification de requete&idreq=<?php echo $id;?>" class="btn btn-primary d-none" id="btnModif<?php echo $id;?>">Modifier</a>
								<button class="btn btn-primary d-none" name="supprReq" id="btnSuppr<?php echo $id;?>">Supprimer</button>
								<?php
							}?>
						</p>
						<p class="d-none" id="pInfo<?php echo $id;?>">
							<label>Type de fichier </label>
							<select id="select<?php echo $id;?>" name="fileType" disabled required>
								<option selected></option>
								<option value="csv">CSV</option>
								<option value="txt">TXT</option>
								<option value="json">JSON</option>
							</select>
							<label>User base </label>
							<select id="selectBase<?php echo $id;?>" name="base" disabled required>
								<option selected></option>
								<?php 
								$ligne2 = getBaseByRequest($id);
								foreach($ligne2 as $data2)
								{
									$idBase = $data2['base_id'];
									$userBase = $data2['base_userBDD'];

									?><option value="<?php echo $idBase;?>"><?php echo $userBase; ?></option><?php
								}?>
							</select>
							 <button type="button" class="btn btn-primary" id="btnFile<?php echo $id;?>" onclick="progressBar(<?php echo $id;?>)"><span class="fa fa-download"></span></button> 
							 <progress id="progressBar<?php echo $id;?>" class="align-middle ml-2 mr-2 rounded bg-light" value="0" max="100"></progress><a class="btn btn-primary disabled" id="a<?php echo $id;?>"><span role="status" aria-hidden="true"></span> Téléchargé</a>
						</p>
					</form>
					<?php
				}
			//si aucune requête n'est trouver depuis la recherche
			} else {
				?>
				<div class="row">
					<div class="col">
						<p class="text-center">Aucune requête trouver</p>
					</div>
				</div>
				<?php
			}
		//Si l'utilisateur n'as effectué aucune recherche sa affiche toute les requêtes dont il a les permissions
		} else {
			//variable de test
			$user = "tthierry";
			$exec = true;
			//récuperation des requêtes
			$ligne = getRequestByPermission($user, $exec);
			//si il y a des requêtes récupéré
			if(isset($ligne))
			{
				//Affichage des requêtes
				$i = 0;
				foreach($ligne as $data)
				{
					//récupération des données
					$id = $data['req_id'];
					$titre = $data['req_titre'];
					$req = $data['req_commande'];
					$desc = $data['req_description'];
					$sigleApp = $data['app_sigle'];
					$base = $data['base_libelle'];
					$perm_modif = $data['tperm_modification'];

					//remplacement de caractère mal encodé par MySQL
					$req = str_replace("&quot;", '"', $req);
					$req = str_replace("&amp;", '&', $req);
					$desc = str_replace("&quot;", '"', $desc);
					$desc = str_replace("&amp;", '&', $desc);
					?>
					<!--affichage des données-->
					<form method="POST" action="./index.php?menu=catalogue">
						<?php if($i != 0) echo '<hr>'; ?>
						<input type="hidden" name="idReq" value="<?php echo $id;?>">
						<p>
							<label><?php echo $titre;?></label> 
							<button type="button" class="btn btn-primary" onclick="deployRequest(<?php echo $id; ?>)" id="btnDeploy<?php echo $id; ?>">
								<span class="fa fa-chevron-down" id="spanButtonDeploy<?php echo $id; ?>"></span>
							</button>
						</p>
						<p>
							<label id="lblRequete<?php echo $id;?>" class="d-none align-top">Requete</label>
						</p>
						<p>
							<textarea cols="80" rows="10" id="textareaReq<?php echo $id;?>" class="d-none" disabled readonly><?php echo $req; ?></textarea>
						</p>
						<p>
							<label id="lblDesc<?php echo $id;?>" class="d-none align-top">Description</label>
						</p>
						<p>
							<textarea cols="50" rows="3" id="textareaDesc<?php echo $id;?>" class="d-none" disabled readonly><?php echo $desc; ?></textarea>
						</p>
						<p>
							<label class="d-none" id="lblApp<?php echo $id;?>">Application :</label> <input type="text" value="<?php echo $sigleApp;?>" readonly disabled id="inputApp<?php echo $id;?>" class="d-none">
						</p>
						<p>
							<button type="button" class="btn btn-primary d-none" id="btnExec<?php echo $id;?>" onclick="deployExec(<?php echo $id; ?>)">Exécuté 
								<span class="fa fa-chevron-down" id="spanButtonReq<?php echo $id; ?>"></span>
							</button> 
							<?php
							if($perm_modif == 1)
							{
								?>
								<a href="./index.php?menu=modification de requete&idreq=<?php echo $id;?>" class="btn btn-primary d-none" id="btnModif<?php echo $id;?>">Modifier</a>
								<button class="btn btn-primary d-none" name="supprReq" id="btnSuppr<?php echo $id;?>">Supprimer</button>
								<?php
							}?>
						</p>
						<p class="d-none" id="pInfo<?php echo $id;?>">
							<label>Type de fichier </label>
							<select id="select<?php echo $id;?>" name="fileType" disabled required>
								<option selected></option>
								<option value="csv">CSV</option>
								<option value="txt">TXT</option>
								<option value="json">JSON</option>
							</select>
							<label>User base </label>
							<select id="selectBase<?php echo $id;?>" name="base" disabled required>
								<option selected></option>
								<?php 
								$ligne = getBaseByRequest($id);
								foreach($ligne as $rows)
								{
									$baseId = $rows['base_id'];
									$baseLibelle = $rows['base_userBDD'];

									?><option value="<?php echo $baseId;?>"><?php echo $baseLibelle;?></option><?php
								}?>
							</select>
							 <button type="button" class="btn btn-primary" id="btnFile<?php echo $id;?>" onclick="progressBar(<?php echo $id;?>)"><span class="fa fa-download"></span></button> 
							 <progress id="progressBar<?php echo $id;?>" class="align-middle ml-2 mr-2 rounded bg-light" value="0" max="100" data-toggle="tooltip"></progress><a class="btn btn-primary disabled" id="a<?php echo $id;?>"><span role="status" aria-hidden="true"></span> Téléchargé</a>
						</p>	
					</form>
				<?php
				$i++;
				}
			//si aucune requête n'est trouver sans la recherche
			} else {
				?><div class="row">
					<div class="col">
						<p class="text-center">Aucune requete</p>
					</div>
				</div>
			<?php
			}
		}?>
		</div>
	</div>
</section>
<?php
if(isset($_SESSION['idreq']))
{
	unset($_SESSION['idreq']);
}
?>