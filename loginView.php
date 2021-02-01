
		<?php $title = 'Connexion'; ?>

		
		<?php ob_start(); ?>
 		<h2 class="titre-acceuil"><span class="letter-title">C</span>onnexion</h2>
 		<?php $allchaptertitle = ob_get_clean(); ?>
		

			
<?php ob_start(); ?>
			<form class="form-log-in" method="post" action="index.php?action=loginMember">
				<p>
   					<label>Votre nom</label> :	<input type="text" name="nom_login" />
   				</p>
   				<p>
   					<label>Votre mot de passe</label> :	<input type="password" name="mdp_login" />
   				</p>   				
   				<div>
          			<button class="btn btn-primary">Connexion</button>                      
        		</div>
			</form>	



<?php $content = ob_get_clean(); ?>
		
	

<?php require('Template/template-v1.php'); ?>

