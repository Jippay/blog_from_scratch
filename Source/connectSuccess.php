<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" integrity="sha384-D/7uAka7uwterkSxa2LwZR7RJqH2X6jfmhkJ0vFPGUtPyBMF2WMq9S+f9Ik5jJu1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>connexion resultat</title>
</head>
<body>

<?php
require_once 'class/connectDB.php';
?>
<?php
if(isset($_POST['connexion'])){

            $pseudo = htmlspecialchars($_POST["pseudo"]);

            $db = new connectionDb();
            $req = $db->db->prepare('SELECT id_membre, mdp, statut_membre FROM membre WHERE pseudo = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            $resultat = $req->fetch();

            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

            if (!$resultat){
                echo '
                <div class="d-flex justify-content-center">
                    <div class="card border-warning mt-3 mb-3" style="max-width: 20rem;">
                        <div class="card-header">Attention</div>
                        <div class="card-body">
                            <h4 class="card-title">Mauvais mot de passe ou pseudo</h4>
                            <a href="connexion.php" class="card-text">On retente ?</p>
                        </div>
                    </div>
                <div>';
            } else {
                if ($isPasswordCorrect) {
                    session_start();
                    $_SESSION['id_membre'] = $resultat['id_membre'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['statut_membre'] = $resultat['statut_membre'];
                    header('Location: index.php');

                }
                else {
                    echo '<div class="d-flex justify-content-center">
                    <div class="card border-warning mt-3 mb-3" style="max-width: 20rem;">
                        <div class="card-header">Attention</div>
                        <div class="card-body">
                            <h4 class="card-title">Mauvais mot de passe ou pseudo</h4>
                            <a href="connexion.php" class="card-text">On retente ?</p>
                        </div>
                    </div>
                <div>';
                }
        }
}
?>




<?php
include('footer.php');
?>