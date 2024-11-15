<?php

$title = htmlspecialchars($_POST['title'],ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'],ENT_QUOTES, 'UTF-8');

try {
    $connexion = new PDO("mysql:host=localhost;dbname=blog_fun", "root", "");
} catch (PDOException $error)

{
    echo "une erreur c'est produit lors de la connexion à votre base de donner : " . $error->getMessage();
   
}


$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stm = $connexion->prepare("INSERT INTO article (title,content) VALUES (:title, :content) ");

$stm->bindParam(':title', $title);
$stm->bindParam(':title', $content);

if($stm->execute()):
    header("location: index.php");
else:
    echo "Erreur lors de l'ajout d'un article !!!!!!!!";
endif;

$connexion = null;