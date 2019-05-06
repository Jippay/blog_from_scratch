<?php
include('head.php');?>

<main>
    <?php
    require_once 'class/connectDB.php';


    if(isset($_POST['modifier'])){
        $titre = htmlspecialchars($_POST["titre"]);
        $sous_titre = htmlspecialchars($_POST["sous_titre"]);
        $contenu = htmlspecialchars($_POST["contenu"]);
        $_SESSION['id_membre']; // on récupere l'id de l'utilisateur grâce à sa session
        $id = $_GET['id'];

        $db = new connectionDb();
        $modifDB = $db->db->prepare("UPDATE article SET titre = :titre, sous_titre = :sous_titre, contenu = :contenu WHERE id_article = :id");
        $modifDB->execute(array(
            'titre' => $titre,
            'sous_titre' => $sous_titre,
            'contenu' => $contenu,
            'id' => $id
        ));
        if(isset($_SESSION['pseudo']) && $_SESSION['statut_membre'] == 2){
        echo '
            <div class="d-flex justify-content-center">
                <div class="card border-primary mt-5 mb-3 shadowBox2" style="max-width: 20rem;">
                    <div class="card-header">Super !</div>
                    <div class="card-body">
                        <h4 class="card-title">Article modifié</h4>
                        <a href="publierArticle.php?id='.$id.'" class="card-text">Publier l\'article ?</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a class="btn btn-info shadowBox" href="index.php" role="button">retour à l\'accueil</a>
            </div>
        ';} 
        else {
            echo '
            <div class="d-flex justify-content-center">
                <div class="card border-primary mt-5 mb-3 shadowBox2" style="max-width: 20rem;">
                    <div class="card-header">Super !</div>
                    <div class="card-body">
                        <h4 class="card-title">Article modifié</h4>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a class="btn btn-info shadowBox" href="mesArticles.php" role="button">retour à l\'accueil</a>
            </div>
        ';
        };
    }?>
</main>
<?php
include('footer.php');
?>