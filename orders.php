<?php

// Connection
try {
    $db = new PDO('mysql:host=localhost;dbname=bde;port=3306', 'lwbc5bfdbn2c', '#Patatedouce13');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Processing
if (isset($_POST['ingredient']) && isset($_POST['horaire']) && isset($_POST['lieu']) && isset($_POST['nom']) && isset($_POST['tel'])) {

    $format = "H:i";

    $req = $db->prepare('INSERT INTO commandes (nom, telephone, ingredient, horaires, lieu, temps) VALUES (?, ?, ?)');
    $req->bindParam(1, htmlspecialchars($_POST['nom']));
    $req->bindParam(2, htmlspecialchars($_POST['tel']));
    $req->bindParam(3, htmlspecialchars($_POST['ingredient']));
    $req->bindParam(4, htmlspecialchars($_POST['horaire']));
    $req->bindParam(5, htmlspecialchars($_POST['lieu']));
    $req->bindParam(6, date($format));
    $req->execute();

    header("location: index.html");
} else {
    echo "Error";
    header("location: index.html");
}

?>