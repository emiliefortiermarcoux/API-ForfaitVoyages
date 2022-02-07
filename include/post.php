<?php
$corpsJSON = file_get_contents('php://input'); 
$data = json_decode($corpsJSON, TRUE);

$reponse = new stdClass(); 
$reponse->message = "Ajout dun forfait: "; 

if( isset($data['destination']) 
&& isset($data['date_depart']) 
&& isset($data['date_arrivee']) 
&& isset($data['hotel_nom']) 
&& isset($data['hotel_coordonnees']) 
&& isset($data['hotel_nbetoiles']) 
&& isset($data['hotel_nbchambres']) 
&& isset($data['hotel_caracteristiques']) 
&& isset($data['hotel_image']) 
&& isset($data['prix'])
&& isset($data['rabais']) 
&& isset($data['vedette']) 
&& isset($data['ville_depart'])) {

	if ($requete = $mysqli->prepare("INSERT INTO forfaits(destination, date_depart, date_arrivee, hotel_nom, hotel_coordonnees, hotel_nbetoiles, hotel_nbchambres, hotel_) VALUES(?, ?)")) { 
		$requete->bind_param("ss", $data['nom'], $data['prenom']); 
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
	$reponse->message .= "Erreur dans le corps de l'objet fourni"; 
} 

echo json_encode($reponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>