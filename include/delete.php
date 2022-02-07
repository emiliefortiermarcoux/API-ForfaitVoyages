<?php
$reponse = new stdClass(); 
$reponse->message = "Suppression du forfait: "; 

if(isset($_GET['id'])) { 
	if ($requete = $mysqli->prepare("DELETE FROM forfaits WHERE id=?")) { 
		$requete->bind_param("i", $_GET['id']); 
		if($requete->execute()) { 
			$reponse->message .= "Succès"; 
		} else { 
			$reponse->message .= "Erreur dans l'exécution de la requête"; 
		} 
		$requete->close(); 
	} else { 
		$reponse->message .= "Erreur dans la préparation de la requête"; 
	} 
} else { 
	$reponse->message .= "Erreur dans les paramètres (aucun identifiant fourni)"; 
} 
echo json_encode($reponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
break;

