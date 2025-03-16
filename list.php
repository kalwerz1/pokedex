<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
-->
<?php
require_once("head.php");
?>  

<table>
    <thead>
        <th>Id</th>
        <th>Nom</th>
        <th>Image</th>
        <th>Type(s)</th>
    </thead>
    <tbody>
    <?php
 
    $db = new mysqli("localhost", "root", "", "pokemon");
    $db->set_charset("utf8");
    $result = $db->query("SELECT *, t1.nomType AS type1, t2.nomType AS type2 FROM pokemon LEFT JOIN type_pokemon AS t1 ON pokemon.idType1 = t1.idType LEFT JOIN type_pokemon AS t2 ON pokemon.idType2 = t2.idType ORDER BY pokemon.idPokemon");


    while ($row = $result->fetch_assoc()) {
    echo 
    '<tr>
    <td>' . $row['idPokemon'] . '</td>
    <td>' . $row['nomPokemon'] . '</td>
    <td><img src="' . $row['urlPhoto'] . '" width="100"></td>
    <td>' .$row['type1'].'<br>'.$row['type2'] .'</td>
    </tr>';
}
?>
    </tbody>
</table>
<?php>
require_once("footer.php");
?>