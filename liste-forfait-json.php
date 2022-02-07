<?php 
	header('Content-Type: application/json'); 
	$page = "liste-forfaits-json";

	include_once 'include/config.php'; 

	 // Établissement de la connexion à la base de données 
	$mysqli = new mysqli($host, $username, $password, $database); 

	 // Affichage d'une erreur si la connexion échoue 
	if ($mysqli -> connect_errno) {	
		echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error; 
		exit(); 
	} 

	$resultat_requete = $mysqli->query("SELECT * FROM forfaits"); 

	$forfaits = $resultat_requete->fetch_all(MYSQLI_ASSOC); 
	echo json_encode($forfaits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

 	// Fermeture de la connexion
 	$mysqli->close(); 
?>
