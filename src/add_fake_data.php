<?php
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

//for($i = 0; $i < 3;$i++):
//echo  "<h2>" .$faker->sentence() . "</h2>";
//echo "<br>";
//echo "<p>" .$faker->paragraphs(10, true) . "</p>";
//echo "<hr>";
//endfor;

try {
    $connexion = new PDO("mysql:host=localhost;dbname=blog_fun", "root", "");
} catch (PDOException $error)

{
    echo "une erreur c'est produit lors de la connexion à votre base de donner : " . $error->getMessage();
   
}


$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

for ($i = 0; $i < 10;$i++):
$stm = $connexion->prepare("INSERT INTO article (title,content) VALUES (:title, :content) ");

$title = $faker->sentence();
$content = $faker->paragraphs(10, true);


$stm->bindParam(':title', $title);
$stm->bindParam(':content', $content);

if($stm->execute()):
    header("location: index.php");
else:
    echo "Erreur lors de l'ajout d'un article !!!!!!!!";
endif;
endfor;
$connexion = null;