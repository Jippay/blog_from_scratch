<?php
include('head.php');
require_once 'class/connectDB.php';

if(isset($_POST['inscription'])){
        $prenom = htmlspecialchars($_POST["prenom"]);
        $pass_hache = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = $_POST["email"];

        //requette pour savoir si l'email et le pseudo sont déjà utilisés
        $db = new connectionDb();
        $requete_pdo = $db->db->prepare("SELECT * FROM membre WHERE email = '$email' OR pseudo = '$pseudo'");
        $requete_pdo->execute();
        if(($requete_pdo->rowCount()) == 0){
            //email ou pseudo non utilisé : insertion dans la base de données
            $insertDB = $db->db->prepare("INSERT INTO membre (prenom, pseudo, email, mdp, date, statut_membre) VALUES (:prenom, :pseudo, :email, :mdp, :date_inscript, :statut)");
            $insertDB->execute(array(
                'prenom' => $prenom,
                'pseudo' => $pseudo,
                'email' => $email,
                'mdp' => $pass_hache,
                'date_inscript' => date("Y-m-d H:i:s"),
                'statut' => 1 // 1 = utilisateur inscrit
            ));
                // message qui informe l'utilisateur de son inscription
            echo '<div class="d-flex justify-content-center mt-5">
                    <div class="card border-success mb-3" style="max-width: 20rem;">
                        <div class="card-header">Super !</div>
                        <div class="card-body">
                            <h4 class="card-title">L\'inscription s\'est déroulé sans probleme.</h4>
                            <p class="card-text">Tu peux soit retourner à l\'accueil, soit te connecter !</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <a class="btn btn-info" href="connexion.php" role="button">Se connecter</a>
                </div>';

                // location.assign('/index.php');
                // exit;
            
        } else 
            //email ou pseudo déjà utilisé : texte d'avertissement / pas d'ajout dans la base de données
            echo '<div class="d-flex justify-content-center mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
                        <div class="card-header">Erreur ...</div>
                        <div class="card-body">
                            <h4 class="card-title">L\'email ou le pseudo est déjà utilisé</h4>
                            <p class="card-text">Retourne au formulaire est re-essaye avec un autre pseudo ou un autre email.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-warning" href="inscription.php" role="button">formulaire d\'inscription</a>
                </div>';
    }

?>
<!----- bouton retour à l'accueil--------->
<div class="d-flex justify-content-center mt-2">
    <a class="btn btn-primary" href="index.php" role="button">Accueil</a>
</div>


<?php 
// if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
// {
//     echo 'Bonjour ' . $_SESSION['pseudo'];

// }

include('footer.php');
?>
