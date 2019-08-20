<?php
	// Test Guitare, option i, non sensible à la casse
	if (preg_match("#Guitare#i", "J'aime jouer de la guitare"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// Test guitare ou piano ou banjo
	if (preg_match("#guitare|piano|banjo#", "J'aime jouer de la guitare"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// Commence la chaîne par Bonjour
	if (preg_match("#^Bonjour#", "Bonjour, j'aime jouer de la guitare"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// Fini la chaîne par Merci
	if (preg_match("#$Merci#", "Bonjour, j'aime jouer de la guitare. Merci"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// gris ou gros ou gras
	if (preg_match("#gr[ioa]s#", "Le chat est gris"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// une minuscule ou majuscule ou chiffre
	if (preg_match("#[a-zA-Z0-9]#", "olivier"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// commence par un chiffre
	if (preg_match("#^[0-9]#", "2018 olivier"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// ne commence pas par un chiffre
	if (preg_match("#^[^0-9]#", "olivier"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	
	// Cette phrase ne commence pas par une minuscule
	if (preg_match("#^[^a-z]#", "Je m'appelle olivier"))
	{
		echo 'Le mot que vous cherchez se trouve dans la chaîne';
	}
	else
	{
		echo 'Le mot que vous cherchez ne se trouve pas dans la chaîne';
	}
	

 

 
	
	
?>