<?php 

class Commentaires
{
	protected 	$erreurs = [],
            	$id,            	
            	$nom,
            	$contenu,
            	$dateAjout,
            	$dateModif,
              $signal_id;

  
  const NOM_INVALIDE = 2;
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
  
 
  
  public function setNom($nom)
  {
    if (!is_string($nom) || empty($nom))
    {
      $this->erreurs[] = self::NOM_INVALIDE;
    }
    else
    {
      $this->nom = $nom;
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
  
  public function nom()
  {
    return $this->nom;
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