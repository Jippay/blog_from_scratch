<?php include('head.php')?>
<main>
<div class="container">
    <h1 class="text-center">Bienvenue dans ton espace admin <?php echo $_SESSION['pseudo'] ?>
</div>
<div class="container p-3">
    <h2 class="text-center">Les articles en attente de validation</h2>
    <div class="d-flex justify-content-center flex-wrap">
        <?php
        require_once 'class/connectDB.php';
        require_once 'class/article.php';
        $db = new connectionDb();
        $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE statutArticle = 1  ORDER BY date_article ASC');
        while ($donnees = $reponse->fetch())
            {
                $article[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['prenom'], $donnees['id_article'])

        ;}
        for($x=0; $x<=(count($article)-1); $x++){
                $article[$x]->validerArticle();
        }
        ?>
        
    </div>
</div>
<div class="membres zone2 p-3">
        <div class="container">
            <h2 class="text-center">Les membres inscrits</h2>
            <div class="d-flex justify-content-center flex-wrap">
                <?php
                require_once 'class/connectDB.php';
                require_once 'class/membre.php';
                $db = new connectionDb();
                $reponse = $db->db->query('SELECT * FROM membre WHERE statut_membre = 1');
                while ($donnees = $reponse->fetch()){
                    $membre[] = new membre($donnees['id_membre'], $donnees['prenom'], $donnees['pseudo'], $donnees['email'], $donnees['date'], $donnees['statut_membre'])

                    ;}
                    for($x=0; $x<=(count($membre)-1); $x++){
                            $membre[$x]->ficheMembre();
                    }
                    ?>
            </div>
        </div>
</main>


<?php include('footer.php')?>