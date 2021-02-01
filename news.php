<?php 

class News
{
	protected 	$erreurs = [],
            	$id,            	
            	$titre,
            	$contenu,
            	$dateAjout,
            	$dateModif;

  
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;


    public function __construct($valeurs = [])
  {
    if (!empty($valeurs)) 
    {
      $this->hydrate($valeurs);
    }
  }
  
 
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur)
    {
      $methode = 'set'.ucfirst($attribut);
      
      if (is_callable([$this, $methode]))
      {
        $this->$methode($valeur);
      }
    }
  }

  // -------------------------> SETTERS <-------------------------- //
  
  public function setId($id)
  {
    $this->id = (int) $id;
  }
  
 
  
  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }
    else
    {
      $this->titre = $titre;
    }
  }
  
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
    else
    {
      $this->contenu = $contenu;
    }
  }
  
  public function setDateAjout(DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }
  
  public function setDateModif(DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

   // -------------------------> GETTERS <-------------------------- //
  
  public function erreurs()
  {
    return $this->erreurs;
  }
  
  public function id()
  {
    return $this->id;
  } 
  
  public function titre()
  {
    return $this->titre;
  }
  
  public function contenu()
  {
    return $this->contenu;
  }
  
  public function dateAjout()
  {
    return $this->dateAjout;
  }
  
  public function dateModif()
  {
    return $this->dateModif;
  }
}