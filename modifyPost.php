<?php $title = "Modification de billet"; ?>


		
	
	
<?php ob_start(); ?>
 	<h2 class="titre-acceuil"><span class="letter-title">M</span>odifier un billet</h2>
<?php $allchaptertitle = ob_get_clean(); ?>

<?php ob_start(); ?>
					<form  class="form-log-in" method="post" action="index.php?action=update"> 
						<p>
							<input type="text" id="titre" name="titre" value="<?= htmlspecialchars($news->titre()) ?>"/>
						</p>
						
						<textarea id='tiny' name="contenu"><?= htmlspecialchars($news->contenu()) ?></textarea>

						<input type="hidden" name="id" value="<?= $news->id() ?>"/>
						<div>
							<button class="btn btn-primary" onclick="return sure3();">Publier</button>
						</div>
					</form>


<?php $content = ob_get_clean(); ?>

			
<?php require('Template/template-v1.php'); ?>