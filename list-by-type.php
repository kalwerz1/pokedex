<!-- 
    Ce fichier représente la page de liste par type de pokémon du site.
-->
<?php

require_once("head.php");
require_once("database-connection.php");

$databaseConnection = new mysqli("localhost", "root", "", "pokemon");
$databaseConnection->set_charset("utf8");


$typesResult = $databaseConnection->query("SELECT idType, nomType FROM type_pokemon ORDER BY nomType");

    
while($typeRow = $typesResult->fetch_assoc()) {
    
    echo '<h3>'.$typeRow['nomType'].'</h3>';
    
    echo '<table border="1">';
    '<thead>';
    '<tr>';
    '<th>ID</th>';
    '<th>Nom</th>';
    '<th>Image</th>';
    '</tr>';
    '</thead>';
    '<tbody>';
    
    $result = $databaseConnection->query("SELECT * FROM pokemon WHERE idType1 = ".$typeRow['idType']);
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row['idPokemon'].'</td>';
        echo '<td>'.$row['nomPokemon'].'</td>';
        echo '<td><img src="'.$row["urlPhoto"].'" alt="'.$row['nomPokemon'].'" style="width:100px;"></td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '<hr>';
}
    
require_once("footer.php");
?>