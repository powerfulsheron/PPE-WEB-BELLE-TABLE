<?php

	// 1 : on ouvre le fichier
	$monfichier = fopen('namefichier.txt', 'a+');
	 
	// 2 : on lit la première ligne du fichier
	$ligne = fgets($monfichier);
	
	// 3 :on ecrit dans le fichier
	fputs($monfichier, "J'écris dans le fichier txt");
	 
	// 4 : quand on a fini de l'utiliser, on ferme le fichier
	fclose($monfichier);