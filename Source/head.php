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
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Blog From Scratch</a>
        <?php if(isset($_SESSION['pseudo']) && $_SESSION['statut_membre'] == 1){
                    echo '<span class="badge badge-primary">connecté</span>';
                } elseif (isset($_SESSION['pseudo']) && $_SESSION['statut_membre'] == 2){
                    echo '<span class="badge badge-success">admin</span>';
                }?>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['pseudo']) && $_SESSION['statut_membre'] == 1){
                    echo '<li class="nav-item">
                            <a class="nav-link text-danger" href="déconnexion.php">déconnexion</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-success" href="createPost.php">créer un article</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-info" href="mesArticles.php">mes articles</a>
                          </li>';
                }
                elseif (isset($_SESSION['pseudo']) && $_SESSION['statut_membre'] == 2){
                    echo '<li class="nav-item">
                            <a class="nav-link text-danger" href="déconnexion.php">déconnexion</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-success" href="espaceAdmin.php">mon espace admin</a>
                          </li>';
                }
                else {
                    echo'
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">connexion</a>
                </li>';}?>
            </ul>
        </div>
    </nav>
    </header>