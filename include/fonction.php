<?php
 
function ConversionForfaitsSQLEnObjet($forfaitsSQL) {

    $forfaitsOBJ->forfaits = new stdClass();
    $forfaitsOBJ->forfaits->destination = $forfaitsSQL["destination"];
    $forfaitsOBJ->forfaits->date_depart = $forfaitsSQL["date_depart"];
    $forfaitsOBJ->forfaits->date_arrivee = $forfaitsSQL["date_arrivee"];
    $forfaitsOBJ->forfaits->prix = $forfaitsSQL["prix"];
    $forfaitsOBJ->forfaits->rabais = $forfaitsSQL["rabais"];
    $forfaitsOBJ->forfaits->vedette = $forfaitsSQL["vedette"];
    $forfaitsOBJ->forfaits->ville_depart = $forfaitsSQL["ville_depart"];

    //section hotel
    $forfaitsOBJ->hotels = new stdClass();
    $foefaitsOBJ->hotels->hotel_nom = $forfaitsSQL["hotel_nom"];
    $forfaitsOBJ->hotels->hotel_caracteristiques = $forfaitsSQL["hotel_caracteristiques"];
    $forfaitsOBJ->hotels->hotel_nbetoiles = $forfaitsSQL["hotel_nbetoiles"];
    $forfaitsOBJ->hotels->hotel_nbchambres = $forfaitsSQL["hotel_nbchambres"];

    $forfaitsOBJ->liste_forfaits = explode(";", $forfaitsSQL["liste_forfaits"]);

    return $forfaitsOBJ;
}   

?>