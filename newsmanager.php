<?php

class NewsManager
{
	protected $db;


	public function __construct(PDO $db)
  	{
    $this->db = $db;
  	}

  	public function addNews(News $news)
  	{
  		$requete = $this->db->prepare('INSERT INTO blog(titre, contenu, dateAjout, dateModif) VALUES(:titre, :contenu, NOW(), NOW())');
  		$requete->bindValue(':titre', $_POST['titre']);
  		$requete->bindValue(':contenu', $_POST['contenu']);

  		$requete->execute();
  	}

  	public function getNews()
  	{
  		$requete = $this->db->query('SELECT titre, contenu, dateAjout, id FROM blog ORDER BY id ASC');
  		return $requete;
  	}

    public function deleteNews($id)
    {
      $this->db->exec('DELETE FROM blog WHERE id = ' . $_GET['id']);
           
    }

    public function deleteNewsChap($id)
    {
      $this->db->exec('DELETE blog, commentaires 
        FROM blog
        INNER JOIN commentaires 
        ON blog.id = commentaires.post_id 
        WHERE blog.id = ' . $_GET['id']);
           
    }



    public function getOneNews($id)
    {
      $requete = $this->db->prepare('SELECT titre, contenu, id FROM blog WHERE id = :id');
      $requete->bindValue(':id', (int)$id, PDO::PARAM_INT);
      $requete->execute();

      $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
      $news = $requete->fetch();
      return $news;
    }

    public function updateNews(News $news)
    {
      $requete = $this->db->prepare('UPDATE blog SET titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
    
      $requete->bindValue(':titre', $news->titre());    
      $requete->bindValue(':contenu', $news->contenu());
      $requete->bindValue(':id', $news->id(), PDO::PARAM_INT);
    
      $requete->execute();
    }
}