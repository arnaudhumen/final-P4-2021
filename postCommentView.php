<!DOCTYPE HTML>

<html>
	<head>
		<title>Billet simple pour l'Alaska test</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />		
		<script src="https://cdn.tiny.cloud/1/8thwjsyaavf4qkt2o7m5ad6t8mgsxvy6m5zmry5ndvyy6rjr/tinymce/5/tinymce.min.js"></script>
  		
	</head>
	<body>
		<header>
			<h2>Tous les chapitres</h2>
		</header>
			<a href="index.php">Retour a la liste des chapitres</a>


			
	<h3> <?= htmlspecialchars($news->titre()) ?> </h3>
		<p> <?= htmlspecialchars($news->contenu()) ?> </p>

	<h4> Commentaires : </h4>

	<a href="index.php?action=listComment&amp;id=<?= ($news->id()) ?>">Ajouter un commentaire</a>

	<form action="index.php?action=addComment&amp;id=<?= ($news->id()) ?>" method="post">
    	<div>
        	<label for="author">Auteur</label><br />
        	<input type="text" id="author" name="nom" />
    	</div>
    	<div>
        	<label for="comment">Commentaire</label><br />
        	<textarea id="comment" name="contenu_commentaire"></textarea>
    	</div>
    	<div>
        	<input type="submit" />
    	</div>
	</form>
		 
		 

 

	<body>