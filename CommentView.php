<?php $title = "Administration de billet"; ?>



			
		

<?php ob_start(); ?>
 	<h2 class="titre-acceuil"><span class="letter-title">C</span>ommentaires <span class="letter-title">s</span>ignalés</h2>
<?php $allchaptertitle = ob_get_clean(); ?>>>

<?php ob_start(); ?>		
<table class="table table-striped table-light">
  	<thead>
        <tr>
        	<th scope="col">Auteur</th>
        	<th scope="col">Date</th>
        	<th scope="col">Contenu</th>
        	<th scope="col">Actions</th>
        </tr>
  	</thead>
    <tbody>
     
<?php
while ($comment = $comments->fetch())
{
?> 	<tr class="table-danger">
		<th scope="row">  <strong><?= htmlspecialchars($comment['nom']) ?> </th>
		<td> <?= $comment['dateAjout'] ?> </td>
		<td> <?= nl2br(htmlspecialchars($comment['contenu_commentaire'])) ?></td>
		<td> <a href="index.php?action=allowComment&amp;id=<?=$comment['id']?>" onclick="return sure2();">Autoriser</a> </td>
		<td> <a href="index.php?action=refuseComment&amp;id=<?=$comment['id']?>" onclick="return sure();">Refuser</a> </td>		 
	</tr>						
  
<?php
}
?>
	</tbody>
</table>
<?php $content = ob_get_clean(); ?>

		
		 

<?php require('Template/template-v1.php'); ?>
