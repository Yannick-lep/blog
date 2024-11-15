<?php

try {
    $id = $_GET['id'];

    $connexion = new PDO("mysql:host=localhost;dbname=blog_fun", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connexion->prepare('DELETE FROM article where id = :id');
    $stmt->bindParam(':id ',$id);
    $stmt->execute();

    header("hx-Refresh: true");

} catch (PDOException $error) {
    echo "Erreur de connextion à la base de donnée : " .$error->getMessage();
}

$connexion = null;