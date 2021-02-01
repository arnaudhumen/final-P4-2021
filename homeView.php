
	
	<?php $title = 'Billet simple pour l\'Alaska'; ?>			
	











 <?php ob_start(); ?>
 <h2 class="titre-acceuil"><span class="letter-title">T</span>ous les chapitres</h2>
 <?php $allchaptertitle = ob_get_clean(); ?>


<?php ob_start(); ?>			
	<div class="card-body-first">	
		<?php
		while ($post = $data->fetch())
		{
		?> 	
			<div class="card w-75">
		 		<div class="card-body">
					<h3 class="card-title"><a class="link-title-chapter" href="index.php?action=listCommentHome&amp;id=<?= $post['id']; ?>"><?= $post['titre']; ?></a> </h3>
					<div class="card-text"><?= $post['contenu']; ?>						
					</div>
					<div class="link-bottom-chapitre">
						<a href="index.php?action=listCommentHome&amp;id=<?= $post['id']; ?>" class="card-link">... cliquer ici pour lire la suite !</a>
						<a href="index.php?action=loginView" class="card-link">Connectez vous pour ajouter un commentaire</a>
					</div>	
				</div>
			</div>  
		<?php
		}
		?>
	</div>
<?php $content = ob_get_clean(); ?>


<?php require('Template/template-v1.php'); ?>