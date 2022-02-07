Afficher les chambres disponibles dans un hotel scpecifique

<?php 
	header('Content-Type: application/json'); 
	include_once 'include/config.php'; 

	if(!isset($_GET['nom'])) {// Vérification que la page reçoit un identifiant en paramètre 	
		echo 'Nom de l`hotel manquant ou invalide'; 
		exit(); 
	} 

	$mysqli = new mysqli($host, $username, $password, $database); // Établissement de la connexion

	if ($mysqli -> connect_errno) { // Affichage d'une erreur si la connexion échoue 
		echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error; 
		exit(); 
	} 
	
	if ($requete = $mysqli->prepare("SELECT nbchambres FROM hotels WHERE nom=?")) {// Création d'une requête préparée 
		$requete->bind_param("i", $_GET['nom']); // Envoi des paramètres à la requête 
		$requete->execute(); // Exécution de la requête 
		$resultat_requete = $requete->get_result(); // Récupération de résultats de la requête 			
        $forfaits = $resultat_requete->fetch_assoc(); // Récupération de l'enregistrement 
		echo json_encode($forfaits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 
		$requete->close(); // Fermeture du traitement
	} 
	$mysqli->close(); // Fermeture de la connexion 
?>
