<?php
include("fonctions.php"); // On appel la fonction créé pour se connecté a notre BDD
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>BPM du patient</title>
	<link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>
<body>
	<h1 align=center>Voici les BPM du patient</h1><br>
	<section>
	
	<?php

	//On se connecte en créant une variable connexion

	$connexion = connectMaBase();
	//message de connexion réussie
	
	//On prépare la requête
	$sql = 'SELECT * FROM bpm';  

	// On lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas (or die) 

	$req = mysqli_query($connexion,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connexion));
	//on organise $req en tableau associatif  $data['champ']
	
	//boucle
	while ($data = mysqli_fetch_array($req)) { 

	// on affiche les résultats 
	echo 'BPM ' .$data['BPM'];
	}  
	
	//$data de PHP lui est toujours accessible !
	mysqli_free_result ($req);  
	
	// pour se deconnecter
	deconnectMaBase ($connexion);

	?>
	</section>
	<a  href="index.html"><i>Retour INDEX</i></a><br>
</body>
</html>