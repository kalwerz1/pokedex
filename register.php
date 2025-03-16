<?php
require_once("head.php");
require_once("database-connection.php");

$conn = new mysqli("localhost", "root", "", "pokemon");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (name, prenom, login, PASSWORD) VALUES ('$name', '$prenom', '$login', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Inscription échouée, veuillez changer des caractères" . $conn->error;
    }
}
?>

<form method="POST">
    Nom: <input type="text" name="nom" required><br>
    Prénom: <input type="text" name="prenom" required><br>
    Login: <input type="text" name="login" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <button type="submit">S'inscrire</button>
</form>