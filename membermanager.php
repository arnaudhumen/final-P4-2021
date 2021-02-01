<?php

class MemberManager
{
	protected $db;

	public function __construct(PDO $db)
  	{
    $this->db = $db;
  	}

	function addMember($nom, $pass_hache, $mdpConfirme, $idType)
	{
		$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
		$mdpConfirme = password_hash($_POST['confirme_mdp'], PASSWORD_DEFAULT);
		$requete = $this->db->prepare('INSERT INTO utilisateurs(nom, mdp, confirme_mdp, id_type) VALUES(?, ?, ?, ?)');		

  		$requete->execute(array($nom, $pass_hache, $mdpConfirme, $idType));
	}

	function getMember($nom)
	{
		$requete = $this->db->prepare('SELECT id, mdp, id_type FROM utilisateurs WHERE nom = ?');
		$requete->execute(array($nom));
		return $requete->fetch();		
	}
}