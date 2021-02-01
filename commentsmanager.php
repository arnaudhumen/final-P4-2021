<?php

class CommentsManager
{
	protected $db;

	public function __construct(PDO $db)
  	{
    $this->db = $db;
  	}

  	public function postComment($postId, $signalId, $nom, $contenuCom)
  	{
  		$requete = $this->db->prepare('INSERT INTO commentaires(post_id, signal_id, nom, contenu_commentaire, dateAjout, dateModif) VALUES(?, ?, ?, ?, NOW(), NOW())');
  		$addcommentaire = $requete->execute(array($postId, $signalId, $nom, $contenuCom));

  	return $addcommentaire;
  	}

  	public function getComments($postId)
  	{
  		$requete = $this->db->prepare('SELECT id, nom, contenu_commentaire, dateAjout FROM commentaires WHERE post_id = ? AND signal_id = 1 ORDER BY id ASC');
      $requete->execute(array($postId));

  		return $requete;
  	}

    public function getSignalComments($postId)
    {
      $requete = $this->db->prepare('SELECT id, nom, contenu_commentaire, dateAjout FROM commentaires WHERE post_id = ? AND signal_id = 0 ORDER BY id ASC');
      $requete->execute(array($postId));

      return $requete;
    }

      public function getPostId($id)
    {
      $requete = $this->db->prepare('SELECT post_id FROM commentaires WHERE id = ?');
      $requete->execute(array($id));


      return $requete->fetch();
    }

    public function getRefusedComments($postId)
    {
      $requete = $this->db->prepare('SELECT id, nom, contenu_commentaire, dateAjout FROM commentaires WHERE post_id = ? AND signal_id = 2 ORDER BY id ASC');
      $requete->execute(array($postId));

      return $requete;
    }

    public function deleteSignalComment($id)
    {
      $this->db->exec('DELETE FROM commentaires WHERE id = ' . $_GET['id']);
    }

    public function deleteChapterComment($postId)
    {
      $this->db->exec('DELETE FROM commentaires WHERE post_id = ' . $_GET['post_id']);
    }

    public function getOneComment($id)
    {
      $requete = $this->db->prepare('SELECT nom, contenu_commentaire FROM commentaires WHERE id = :id');
      $requete->bindValue(':id', (int)$id, PDO::PARAM_INT);
      $requete->execute();

      $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Commentaires');
      $comment = $requete->fetch();
      return $comment;
    }

    public function updateComment(Commentaires $comments)
    {
      $requete = $this->db->prepare('UPDATE commentaires SET nom = :nom, contenu_commentaire = :contenu, dateModif = NOW() WHERE id = :id');
    
      $requete->bindValue(':nom', $comments->nom());    
      $requete->bindValue(':contenu', $comments->contenu());
      $requete->bindValue(':id', $comments->id(), PDO::PARAM_INT);
    
      $requete->execute();
    }


    public function signalComment($id)
    {
      $requete = $this->db->prepare('UPDATE commentaires SET signal_id = 0 WHERE id = :id');
      $requete->bindValue(':id', $id, PDO::PARAM_INT);

      $requete->execute();
    }

     public function allowSignalComment($id)
    {
      $requete = $this->db->prepare('UPDATE commentaires SET signal_id = 1 WHERE id = :id');
      $requete->bindValue(':id', $id, PDO::PARAM_INT);

      $requete->execute();
    }

      public function refuseSignalComment($id)
    {
      $requete = $this->db->prepare('UPDATE commentaires SET signal_id = 2 WHERE id = :id');
      $requete->bindValue(':id', $id, PDO::PARAM_INT);

      $requete->execute();
    }



}