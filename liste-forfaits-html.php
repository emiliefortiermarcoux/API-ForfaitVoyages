<?php
    $page = "liste-forfaits-html";
    include_once 'include/config.php'; 



    $mysqli = new mysqli($host, $username, $password, $database); 
    if ($mysqli -> connect_errno) { 
        echo 'Échec de connexion à la base de données MySQL: ' . $mysqli -> connect_error;
        exit();
    } 


?>

<div class="container">
  <?php
      echo '<table>';
      echo '<td>  <p> nom de l`hotel <p>';
      echo '<td>  <p> Prix <p>';
      echo '<td>  <p> Rabais <p>';
      echo '<td>  <p> Vedette <p>';
      echo '<td>  <p> destination <p>';
      echo '<td>  <p> ville de depart <p>';
      echo '<td>  <p>  date depart <p>';
      echo '<td>  <p>  date arrivee <p>';
      echo '<td>  <p> Caracteristiques <p>';
      echo '<td>  <p> Etoiles <p>';
      echo '<td>  <p> Nombres de chambres <p>';
      

      $res = $mysqli->query("SELECT * FROM forfaits");
      while ($forfaits = $res->fetch_assoc()) {
      echo '<tr>';
      echo '<td> ' . $forfaits["hotel_nom"] . '</td>';
      echo '<td> ' . $forfaits["prix"] . '</td>';
      echo '<td> ' . $forfaits["rabais"] . '</td>';
      echo '<td> ' . $forfaits["vedette"] . '</td>';
      echo '<td> ' . $forfaits["destination"] . '</td>';
      echo '<td> ' . $forfaits["ville_depart"] . '</td>';
      echo '<td> ' . $forfaits["date_depart"] . '</td>';
      echo '<td> ' . $forfaits["date_arrivee"] . '</td>';
      echo '<td> ' . $forfaits["hotel_caracteristiques"] . '</td>';
      echo '<td>' . $forfaits["hotel_nbetoiles"] . '</td>';
      echo '<td>' . $forfaits["hotel_nbchambres"] . '</td>';
      echo '<td>';

      echo '</tr>';}
      echo '</table>';
    ?>
  </div>