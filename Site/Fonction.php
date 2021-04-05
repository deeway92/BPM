<?php
function connectMaBase(){
    $serveur = "localhost";
		$login = "root";
		$mdp = "";
		$bdd = "bpm";
		return mysqli_connect($serveur, $login, $mdp, $bdd);
	}
	
function deconnectMaBase($connexion) {
		mysqli_close($connexion);
	}
?>