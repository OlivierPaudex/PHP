<?php
require_once('./models/frontend/Personnage.php');

use \Fuyens\POO\Personnage;

function test()
{
	// créer les personnages
	$personnage1 = new Personnage;
	$personnage2 = new Personnage;
	
	// donner un nom
	$personnage1->_nom = "Olivier";
	$personnage2->_nom = "Ludivine";
	
	$perso1 = $personnage1->parler($personnage1);
	$perso2 = $personnage2->parler($personnage2);
	
	$personnage1->frapper($personnage2); 
	$personnage1->gagner_experience(); 
	$experience_personnage1 = $personnage1->afficher_experience();

	
	
	
	

	require('./views/frontend/View.php');
}