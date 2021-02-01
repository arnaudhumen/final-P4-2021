<?php $title = 'Lecture'; ?>


		
	
			<?php ob_start(); ?>
 		<h2 class="titre-acceuil" id="titre-chapitre"><?= htmlspecialchars($news->titre()); ?></h2>
 	<?php $allchaptertitle = ob_get_clean(); ?>

<?php ob_start(); ?>
	<div class="card-body-first">
		<div class="card w-75">
		 	<div class="card-body">
		 		<div class="card_text_specif">		
					<p> <?= ($news->contenu()); ?> </p>
					</div>
		 		<a href="index.php?action=loginView" class="card-link">Connectez vous pour ajouter un commentaire !</a>
			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>
			
		

		<?php ob_start(); ?>
 	<h4 class="titre-acceuil"><span class="letter-title">C</span>ommentaires :</h4>
<?php $commenttitle = ob_get_clean(); ?>

			<?php ob_start(); ?>
		<div class="card-body-first">
			<?php
        		while ($comment = $comments->fetch())
        	{
        	?>
        	
				<div class="card w-75">
		 			<div class="card-body">
		 				<div class="card_text_specif">
            			<p><strong>Ecrit par <?= htmlspecialchars($comment['nom']) ?> le <?= $comment['dateAjout'] ?></p>
            			<p>"<?= nl2br(htmlspecialchars($comment['contenu_commentaire'])) ?>"</p>            			
            			</div> 
            		</div>
  				</div>			
	        <?php
        	}
        	?>
        </div>       
        <?php $comments = ob_get_clean(); ?>



			
		

		
			

     
		 
<?php require('Template/template-v2.php'); ?>
 

