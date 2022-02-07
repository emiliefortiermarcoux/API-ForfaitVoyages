<?php
$reponse = new stdClass(); 
$reponse->message = "Édition du client: "; 

$corpsJSON = file_get_contents('php://input'); 
$data = json_decode($corpsJSON, TRUE); 

if(isset($_GET['id'])) { 
	if(isset($data['nom']) && isset($data['prenom'])) { 
		if ($requete = $mysqli->prepare("UPDATE clients SET nom=?, prenom=? WHERE id=?")) {
			$requete->bind_param("ssi", $data['nom'], $data['prenom'], $_GET['id']); 
			if($requete->execute()) { 
				$reponse->message .= "Succès"; 
			} else { 
				$reponse->message .= "Erreur dans l'exécution de la requête"; 
			} $requete->close();
		} else { 
			$reponse->message .= "Erreur dans la préparation de la requête"; 
		} 
	} else { 
		$reponse->message .= "Erreur dans le corps de l'objet fourni"; 
	} 
} else { 
	$reponse->message .= "Erreur dans les paramètres (aucun identifiant fourni)"; 
} 
echo json_encode($reponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 
break;



?>