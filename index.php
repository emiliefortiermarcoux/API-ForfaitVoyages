<?php 
	include_once 'include/config.php'; 
	include_once 'include/fonction.php'; 

	header('Content-Type: application/json;'); 
	header('Access-Control-Allow-Origin: *'); 

    $mysqli = new mysqli($host, $username, $password, $database);
        if ($mysqli -> connect_errno) { 
        echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
        exit();} 

	switch($_SERVER['REQUEST_METHOD']) { 
		case 'GET':
			if(isset($_GET['id'])) { 
                if ($requete = $mysqli->prepare("SELECT * FROM forfaits WHERE id=?")) { 
                    $requete->bind_param("i", $_GET['id']);
                    $requete->execute();

                    $resultat_requete = $requete->get_result(); 			
                    $forfaitsObj = $resultat_requete->fetch_assoc();

                    $forfaitsObj = ConversionForfaitsSQLEnObjet($forfaitsSQL);

                    echo json_encode($forfaitsObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 
                    $requete->close(); 
                }         
        } else { 
            $requete = $mysqli->query("SELECT * FROM forfaits");
            $listeForfaitsObj = [];
    
            while ($forfaitsSQL = $requete->fetch_assoc()) {
                $forfaitsObj = ConversionForfaitsSQLEnObjet($forfaitsSQL);
                    array_push($listeForfaitsObj, $forfaitsObj);


            } 
        }
        
			break; 
            default:
            $reponse = new stdClass();
            $reponse->message = "Opération non supportée";	
            echo json_encode($reponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
?>