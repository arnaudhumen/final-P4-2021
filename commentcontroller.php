<?php

require('Controller/errorcontroller.php');

function listPost(int $id, $db) 
{		
	$manager = new NewsManager($db);	

	$news = $manager->getOneNews($id);
	$data = $manager->getNews();	
	require('View/addCommentView.php');
}

function listPostMember(int $id, $db) 
{	
	
	$manager = new NewsManager($db);	

	$news = $manager->getOneNews($id);

	/*if(empty($news))
	{
		throw new Exception("Mauvais id");
		errorIdMember();
	}*/
		if(empty($news))
		{		
		throw new Exception("Le chapitre n'existe pas");
		}
	else
		{
		require('View/addCommentViewMember.php');
		}


}

function addComment($postId,$signalId, $nom, $contenuCom, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);
	
	$managercomment->postComment($postId, $signalId, $nom, $contenuCom);	

	$data = $manager->getNews();
	require('View/listPostView.php');
}

function listComment($postId, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);

	$comments = $managercomment->getComments($postId);

	require('View/CommentView.php');
}

function listCommentMember($postId, int $id, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);
	

	$comments = $managercomment->getComments($postId);
	$news = $manager->getOneNews($id);

	if(empty($news))
		{		
		throw new Exception("Le chapitre n'existe pas");
		}
	else
		{
		require('View/CommentViewMember.php');
		}
	
}

function listCommentHome($postId, int $id, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);
	

	$comments = $managercomment->getComments($postId);
	$news = $manager->getOneNews($id);

	if(empty($news))
		{
		throw new Exception("Le chapitre n'existe pas");
		}
	else
		{
		require('View/homePostView.php');
		}	
}

function listCommentAdmin($postId, int $id, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);
	
	$comments = $managercomment->getComments($postId);
	$news = $manager->getOneNews($id);

	if(empty($news))
		{
		throw new Exception("Le chapitre n'existe pas");
		}
	else
		{
		require('View/CommentsViewAdmin.php');
		}
	
}

function addCommentMember($postId, $signalId, $nom, $contenuCom, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);
	
	$managercomment->postComment($postId, $signalId, $nom, $contenuCom);	

	$data = $manager->getNews();
	require('View/listPostViewMember.php');
}

function getComment(int $id, $db)
{
	
	$managercomment = new CommentsManager($db);

	$managercomment->getOneComment($id);
}

function signalComment($id, $db)
{
	
	$managercomment = new CommentsManager($db);
	$manager = new NewsManager($db);

	$managercomment->signalComment($id);
	$data = $manager->getNews();


	require('View/listPostViewMember.php');

}

function getSignalComment($postId, $db)
{
	
	$managercomment = new CommentsManager($db);

	$comments = $managercomment->getSignalComments($postId);
	
	require('View/CommentView.php');
}

function deleteSignalComment($id, $db)
{

	$managercomment = new CommentsManager($db);

	$comments = $managercomment->deleteSignalComment($id);	
}

function allowComment($id, $db)
{
	
	$managercomment = new CommentsManager($db);

	$comments = $managercomment->allowSignalComment($id);
	$postid = $managercomment->getPostId($id);


	header('Location: http://localhost/Projet_4/p4_Code/index.php?action=listSignalComments&id=' . $postid['post_id']);	
}

function refuseComment($id, $db)
{
	
	$managercomment = new CommentsManager($db);

	$comments = $managercomment->refuseSignalComment($id);
	$postid = $managercomment->getPostId($id);


	header('Location: http://localhost/Projet_4/P4_Code/index.php?action=listSignalComments&id=' . $postid['post_id']);	
}

