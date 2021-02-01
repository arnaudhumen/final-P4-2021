

<?php $title = "Ajouter un commentaire"; ?>






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
			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>			
	
		

	<?php ob_start(); ?>
 	<h4 class="titre-acceuil"><span class="letter-title">A</span>joutez votre commentaire :</h4>
<?php $commenttitle = ob_get_clean(); ?>
	
<?php ob_start(); ?>
	<form  class="form-log-in" action="index.php?action=addCommentMember&amp;id=<?= $news->id(); ?>" method="post">
    	<div>
        	<label for="author">Publier sous le nom de :</label><br />
        	<input type="text" id="author" name="nom" />        	
    	</div>
    			<p>
   					<input type="hidden" name="signal_id"/>
   				</p>
    	<div>
        	<label for="comment">Commentaire</label><br />
        	<textarea id="comment" name="contenu_commentaire" rows="8" cols="43"></textarea>
    	</div>
    	<div>
          	<button class="btn btn-primary">Publier</button>                      
        </div>
	</form>
<?php $comments = ob_get_clean(); ?>

		 

 


<?php require('Template/template-v2.php'); ?>