<?php $title = 'Billet simple pour l\'Alaska'; ?>
		



<?php ob_start(); ?>
<h2 class="titre-acceuil"><span class="letter-title">Oups!</span><br>Une erreur est survenue.<br><?= $e->getMessage() ?></h2>

 <?php $allchaptertitle = ob_get_clean(); ?>			


<?php ob_start(); ?>
      	<?php if(isset($_SESSION) AND isset($_SESSION['id']) AND $_SESSION['id'] > 0 ) { ?>   	
      	<p class="errorcontent" style="color:white;text-align: center;font-family: 'Bree Serif', serif;">(Veuillez cliquer sur 'Acceuil' dans votre barre de navigation)</p>
      <?php } else { ?>
      	
      <?php } ?>

 <?php $content = ob_get_clean(); ?>
    

	
<?php require('Template/template-error.php'); ?>