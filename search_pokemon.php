<?php
require_once("head.php");
require_once("database-connection.php");
$sql = "SELECT * FROM pokemon WHERE nomPokemon LIKE '%" .$_GET["q"]. "%'";
$res = $databaseConnection->query($sql)->fetch_all(MYSQLI_ASSOC);
foreach ($res as $row){
    echo '<tr>';
    echo '<td>' . $row['idPokemon'] . '</td>';
    echo '<td>' . $row['nomPokemon'] . '</td>';
    echo '<td><img src="' . $row['urlPhoto'] . '" width="100"></td>';
    echo '</tr>';
}
echo '</table>';


require_once("footer.php");
?>