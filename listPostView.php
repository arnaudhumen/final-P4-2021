<?php $title = "Administration de billet"; ?>



	<?php ob_start(); ?>
 <h2 class="titre-acceuil"><span class="letter-title">A</span>dministration</h2>
 <?php $allchaptertitle = ob_get_clean(); ?>>

<?php ob_start(); ?>
	<table  class="table table-striped table-light" id="table-admin-1">
      <tr>
      	<th scope="col">Titre</th>
      	<!-- <th scope="col">Contenu</th> -->
      	<th scope="col">Action</th>
      	<th></th>
      	<th scope="col">Espace Commentaires</th>
      	<th></th>
      	<th></th>
      </tr>
     
<?php
while ($post = $data->fetch())
{
?> 	<tr>
		<th scope="row">  <?= $post['titre']; ?> </th>
		<!-- <td> <?= $post['contenu']; ?> </td> -->
		<td> <a href="index.php?action=modifier&amp;id=<?= $post['id']; ?>">Modifier</a> </td>
		<td> <a href="index.php?action=supprimer&amp;id=<?= $post['id']; ?>" onclick="return sure4();">Supprimer</a> </td>
		<td id="chapterComment"> <a href="index.php?action=listCommentAdmin&amp;id=<?= $post['id']; ?>">commentaires du chapitre</a> </td>
		<td> <a href="index.php?action=listSignalComments&amp;id=<?= $post['id']; ?>">commentaires signalés</a> </td>
		<td id="addComment"> <a href="index.php?action=listPost&amp;id=<?= $post['id']; ?>">Ajouter un commentaire</a> </td> 
	</tr>						
  
<?php
}
?>
</table>

<?php $content = ob_get_clean(); ?>
    




<?php require('Template/template-v1.php'); ?>
