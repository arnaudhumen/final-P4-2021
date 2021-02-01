<?php


function addPost($db) 
{		
	$manager = new NewsManager($db);

	if (isset($_POST['titre'])) 
		{
			$news = new News(
			[
				'titre' => $_POST['titre'],
      			'contenu' => $_POST['contenu']
			]
			);
			$insertPost = $manager->addNews($news);

		}	
	
	require('View/NewPost.php');
}


function listPosts($db)
{	
	$manager = new NewsManager($db);
	
	$data = $manager->getNews();
	
	require('View/listPostView.php');
}



function deletePost(int $id, $db)
{	
	
	$manager = new NewsManager($db);

	$manager->deleteNewsChap((int) $_GET['id']);
	$manager->deleteNews((int) $_GET['id']);

	$data = $manager->getNews();

	require('View/listPostView.php');	
}

function modifyPost(int $id, $db) 
{		
	$manager = new NewsManager($db);

	$news = $manager->getOneNews($id);	
	require('View/modifyPost.php');
}



function updatePost(int $id, $titre, $contenu, $db)
{
	$manager = new NewsManager($db);


		$news = new News(
			[
			'titre' => $titre,
      		'contenu' => $contenu,
      		'id' => $id
			]
		);

	$updatePost = $manager->updateNews($news);
	$data = $manager->getNews();

require('View/listPostView.php');
}

