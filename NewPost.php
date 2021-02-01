<?php $title = "Nouveau billet"; ?>


	
<?php ob_start(); ?>
 	<h2 class="titre-acceuil"><span class="letter-title">N</span>ouveau chapitre</h2>
<?php $allchaptertitle = ob_get_clean(); ?>

 <?php ob_start(); ?>
					<form class="form-log-in" method="post" action="index.php?action=addPost">
						<p>
							<input type="text" id="titre" name="titre" placeholder="Titre du nouveau chapitre"/>
						</p>
						<p>
						<textarea id="tiny" name="contenu"></textarea>
						</p>
						<div>
							<button class="btn btn-primary">Publier</button>
						</div>
					</form>
<?php $content = ob_get_clean(); ?>


			
	
<?php require('Template/template-v1.php'); ?>