	<?php $title = 'Inscription'; ?>


		
		
		<?php ob_start(); ?>
 		<h2 class="titre-acceuil"><span class="letter-title">I</span>nscription</h2>
 		<?php $allchaptertitle = ob_get_clean(); ?>
		

		
 		<?php ob_start(); ?>
		<form class="form-log-in" method="post" action="index.php?action=addMember">
				<p>
   					<label>Votre nom</label> :	<input type="text" name="nom" />
   				</p>
   				<p>
   					<label>Votre mot de passe</label> :	<input type="password" name="mdp" />
   				</p>
   				<p>
   					<label>Confimez votre mot de passe</label> :	<input type="password" name="confirme_mdp" />
   				</p>
   				<p>
   					<input type="hidden" name="id_type"/>
   				</p>
   				<div class="">
          			<button class="btn btn-primary">S'inscrire</button>                      
        		</div>
			</form>	
		<?php $content = ob_get_clean(); ?>
	

	

<?php require('Template/template-v1.php'); ?>
