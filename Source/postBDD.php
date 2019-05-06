<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" integrity="sha384-D/7uAka7uwterkSxa2LwZR7RJqH2X6jfmhkJ0vFPGUtPyBMF2WMq9S+f9Ik5jJu1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <title>Blog Scratch</title>
</head>
<body>

<?php
require_once 'class/connectDB.php';

if(isset($_POST['proposer'])){
    $titre = htmlspecialchars($_POST["titre"]);
    $sous_titre = htmlspecialchars($_POST["sous_titre"]);
    $contenu = htmlspecialchars($_POST["contenu"]);
    $_SESSION['id_membre']; // on récupere l'id de l'utilisateur grâce à sa session

    $db = new connectionDb();
    $insertDB = $db->db->prepare("INSERT INTO article (titre, sous_titre, contenu, statutArticle, date_article, id_membre) VALUES (:titre, :sous_titre, :contenu, :statut, :dateArticle, :id_membre)");
    $insertDB->execute(array(
        'titre' => $titre,
        'sous_titre' => $sous_titre,
        'contenu' => $contenu,
        'statut' => 1,
        'dateArticle' => date("Y-m-d H:i:s"),
        'id_membre' => $_SESSION['id_membre']
    ));

    echo '
        <div class="d-flex justify-content-center">
            <div class="card border-primary mt-5 mb-3 shadowBox2" style="max-width: 20rem;">
                <div class="card-header">Super !</div>
                <div class="card-body">
                    <h4 class="card-title">Article proposé à la validation</h4>
                    <p class="card-text">Avant d\'être publié, votre article vas être soumis à la validation.</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <a class="btn btn-info shadowBox" href="index.php" role="button">retour à l\'accueil</a>
        </div>
        
    ';
}
include('footer.php');