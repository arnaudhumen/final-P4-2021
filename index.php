<?php 
session_start();
require('Controller/autoload.php');
require('Controller/frontcontroller.php');
require('Controller/postcontroller.php');
require('Controller/commentcontroller.php');

$db = DBFactory::getMysqlConnexionWithPDO();


try
{

	if (isset($_GET['action']))	

	{	

		// ----------> ACTION D'UN VISITEUR <----------------------//

		if ($_GET['action'] == 'listCommentHome')
		{
			listCommentHome($_GET['id'], (int)$_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'home')
		{
			homePosts($db);
		}

		// ----------> ACTION DU MEMBRE ADMIN <----------------------//

		elseif ($_GET['action'] == 'addPost')
		{
			addPost($db);
		}

		elseif ($_GET['action'] == 'listPosts')
		{
			listPosts($db);
		}

		elseif ($_GET['action'] == 'listCommentAdmin')
		{
			listCommentAdmin($_GET['id'], (int)$_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'supprimer')
		{
			deletePost($_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'modifier')
		{
			modifyPost($_GET['id'], $db); 
		}

		elseif ($_GET['action'] == 'update')
		{
			updatePost((int) $_POST['id'], $_POST['titre'], $_POST['contenu'], $db);
		}

		elseif ($_GET['action'] == 'listPost')
		{
			listPost($_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'addComment')
		{
			if(!empty($_POST['nom']) AND !empty($_POST['contenu_commentaire'])) 
			{
			addComment((int)$_GET['id'], (int)$_POST['signal_id'] = "1", $_POST['nom'], $_POST['contenu_commentaire'], $db);
			}
			else
			{
				echo "<script>alert(\"Veuillez verifier que toutes les informations demandées pour publier votre commentaire soient bien renseignées!\")</script>";
				listPost($_GET['id'], $db);
			}
		}

		elseif ($_GET['action'] == 'listComment')
		{
			listComment($_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'loginView')
		{
			loginFront();
		}

		elseif ($_GET['action'] == 'signinView')
		{
			signinFront();
		}	

		elseif ($_GET['action'] == 'listSignalComments')
		{
			getSignalComment($_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'deleteSignalComment')
		{
			deleteSignalComment($_GET['id'], $db);
			echo "Ce commentaire a bien été supprimé !</br> <a href=\"index.php?action=listPosts\">Retour a la liste des chapitres</a>";
		}

		elseif ($_GET['action'] == 'allowComment')
		{
			allowComment($_GET['id'], $db);		
		}

		elseif ($_GET['action'] == 'refuseComment')
		{
			refuseComment($_GET['id'], $db);		
		}

		elseif ($_GET['action'] == 'deconnexion')
		{
			deconnexion($db);
		}

	// ----------> ACTION D'UN MEMBRE NORMAL <----------------------//
	 

		elseif ($_GET['action'] == 'listPostsMember')
		{
			listPostsMember($db);
		}

		elseif ($_GET['action'] == 'listCommentMember')
		{
			listCommentMember($_GET['id'], (int)$_GET['id'], $db);

			/*if(isset($_GET['id']) AND isset($_GET['id']))
			{
				listCommentMember($_GET['id'], $_GET['id'], $db);
			}
			else
			{
				echo "<script>alert(\"Impossible d'effectuer cette action!\")</script>";
			}*/
		}

		elseif ($_GET['action'] == 'listPostMember')
		{
			listPostMember((int)$_GET['id'], $db);
		}

		elseif ($_GET['action'] == 'addCommentMember')
		{
			if(!empty($_POST['nom']) AND !empty($_POST['contenu_commentaire'])) 
			{
			addCommentMember((int)$_GET['id'], (int)$_POST['signal_id'] = "1", $_POST['nom'], $_POST['contenu_commentaire'], $db);
			}
			else
			{
				echo "<script>alert(\"Veuillez verifier que toutes les informations demandées pour publier votre commentaire soient bien renseignées!\")</script>";
				listPostMember($_GET['id'], $db);
			}

		}

		elseif ($_GET['action'] == 'signaler')
		{
			$id = $_GET['id'];
			signalComment($id, $db);
		}

	// ----------> INSCRIPTION DU MEMBRE <----------------------// 

		elseif ($_GET['action'] == 'addMember')
		{		
			if(!empty($_POST['mdp']) AND !empty($_POST['nom']) AND $_POST['mdp'] == $_POST['confirme_mdp'])
			{	
			echo "<br><br><br><p style=\"color: white; font-family: 'Bree Serif', serif;  margin-top: 2%; text-align: center;\">Votre inscription a bien été prise en compte ! Connectez vous dès a présent ! <p>";							
				addMemberIntoBAse($_POST['nom'], $_POST['mdp'], $_POST['confirme_mdp'], (int)$_POST['id_type'] = "1", $db);
			} 			
			else
			{
				echo "<script>alert(\"Veuillez verifier que toutes les informations demandées sont remplis et/ou bien renseignées!\")</script>";
				signinFront();
			}		
		}

		//------------> CONNEXION DU MEMBRE <-------------------//

		elseif ($_GET['action'] == 'loginMember')
		{
			
			$result = verifyMember($_POST['nom_login'], $db);

			$correctPassword = password_verify($_POST['mdp_login'], $result['mdp']);
			
			if(!$result)
				{
	    			echo "<script>alert(\"Mauvais identifiant ou mot de passe!\")</script>";
	    			loginFront();
				}
				else
				{
	    			if($correctPassword AND $result['id_type'] == 2) 
	    			{
	        			        			
	        			$_SESSION['id'] = $result['id'];
	        			$_SESSION['nom'] = $_POST['nom_login'];
	        			$_SESSION['id_type'] = $result['id_type'];
	        			echo "<br><br><br><p style=\"color: white; font-size: 150%; font-family: 'Bree Serif', serif;  margin-top: 2%; margin-bottom: -4%; text-align: center;\">Bienvenue " . htmlspecialchars($_SESSION['nom']) . "</p>";
	        			listPosts($db);
	    			}
	    			elseif($correctPassword AND $result['id_type'] == 1)  
	    			{
						        			
	        			$_SESSION['id'] = $result['id'];
	        			$_SESSION['nom'] = $_POST['nom_login'];
	        			$_SESSION['id_type'] = $result['id_type'];
	        			echo "<br><br><br><p style=\"color: white; font-size: 150%; font-family: 'Bree Serif', serif;  margin-top: 2%; margin-bottom: -4%; text-align: center;\">Bienvenue " . htmlspecialchars($_SESSION['nom']) . "</p>";
	        			listPostsMember($db);
	    			} 			
	   				else 
	   				{
	        			echo "<script>alert(\"Mauvais identifiant ou mot de passe!\")</script>";
	    				loginFront();
	    			}			
				}
			}
		elseif (!empty($_GET['action']))
		{
			throw new Exception("Mauvaise action!");
		}
	
	}

	else {
		homePosts($db);	
	}

}
catch(Exception $e)
{	
	errorId($e);
}