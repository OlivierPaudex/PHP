<?php
namespace Fuyens\POO;

require_once('./models/frontend/Manager.php');

// Nous créons une classe « Personnage ».
class Personnage extends Manager
{
	public $_nom;
	private $_force = 20;
	private $_localisation;
	private $_experience = 50;
	private $_degats;
        
	// Nous déclarons une méthode dont le seul but est d'afficher un texte.
	public function parler($personnage)
	{
		$message = "Je suis un personnage et mon nom est : " . $this->_nom . " !";
		return $message;
	}
	
	public function afficher_experience()
	{
		return $this->_experience;
	}
	
	public function gagner_experience()
	{
		// On ajoute 1 à notre attribut $_experience.
		$this->_experience = $this->_experience + 1;
	}
	
	public function frapper($persoAFrapper)
	{
		$persoAFrapper->_degats += $this->_force;
	}
}
