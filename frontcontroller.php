<?php



function homePosts($db)
{
	
	$manager = new NewsManager($db);
	
	$data = $manager->getNews();
	
	require('View/homeView.php');
}

function loginFront()
{
	require('View/loginView.php');
}

function signinFront()
{
	require('View/signinView.php');
}

function addMemberIntoBAse($nom, $pass_hache, $mdpConfirme, $idType, $db)
{
	
	$membermanager = new MemberManager($db);
	$manager = new NewsManager($db);


	$membermanager->addMember($nom, $pass_hache, $mdpConfirme, $idType);
	$data = $manager->getNews();

	require('View/homeView.php');
}

function verifyMember($nom, $db)
{
	
	$membermanager = new MemberManager($db);

	return $membermanager->getMember($nom);
}

function listPostsMember($db)
{
	
	$manager = new NewsManager($db);
	
	$data = $manager->getNews();
	
	require('View/listPostViewMember.php');
}

function deconnexion($db)
{
	
	session_unset ();	
	session_destroy ();

	
	$manager = new NewsManager($db);
	
	$data = $manager->getNews();
	require('View/homeView.php');
}