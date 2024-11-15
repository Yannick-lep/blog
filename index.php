<?php
$connexion = new PDO("mysql:host=localhost;dbname=blog_fun", "root", "");

$result = $connexion->query('SELECT * FROM article Order By id DESC');

$articles = [];



while($row = $result->fetch(PDO::FETCH_ASSOC)):
    $articles[] = $row;
endwhile;

$connexion = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main>
        <header>
            <a href="add_form.php">Ajouter un article</a>
        </header>
        <?php
        foreach($articles as $article):
        
        ?>
        <section>
            <h2><?= $article['title'] ?></h2>
            <p><?= $article['content'] ?></p>
        </section>
        <?php 
        endforeach;
        ?>
    </main>
</body>
</html>