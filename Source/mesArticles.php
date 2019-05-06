<?php include('head.php')?>

<main>
    <div class="zoneArticle p-3">
        <h1 class="text-center">Mes articles</h1>
    </div>
        <!-- zone des articles en attente de validation = statut 1 -->
        <div class="container-fluid p-3 zone1">
            <h2 class="text-center text-muted p-2">En attente de validation</h2>
            <h3 class="text-center text-muted pb-2">T'inquietes pas, c'est juste qu'on est débordé ...</h3>
            <div class="d-flex justify-content-center flex-wrap">
                <?php
                    require_once 'class/connectDB.php';
                    require_once 'class/article.php';

                    $db = new connectionDb();
                    $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE id_membre ='.$_SESSION['id_membre'].' AND statutArticle = 1 ORDER BY date_article ASC');
                    while ($donnees = $reponse->fetch())

                        {
                            $article1[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['pseudo'], $donnees['id_article'])

                        ;}
                        for($x=0; $x<=(count($article1)-1); $x++){
                            $article1[$x]->modifArticle();
                        };
               
                        $reponse->closeCursor();
                        ?>
            </div>
        </div>
        <!-- zone des articles publiés = statut 2 -->
        <div class="container-fluid p-3 zone2">
            <h2 class="text-center text-white-50 p-2">Articles validés</h2>
            <h3 class="text-center text-white-50">Hey ! Félicitation !!!</h3>
            <div class="d-flex justify-content-center flex-wrap">
                <?php require_once 'class/connectDB.php';
                $db = new connectionDb();
                    $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE id_membre ='.$_SESSION['id_membre'].' AND statutArticle = 2 ORDER BY date_article ASC');
                    while ($donnees = $reponse->fetch())
                        {
                        $article2[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['pseudo'], $donnees['id_article'])

                    ;}
                    for($x=0; $x<=(count($article2)-1); $x++){
                            $article2[$x]->createArticle();
                    };?>
                    <?php $reponse->closeCursor(); ?>
            </div>
        </div>
</main>
<?php include('footer.php')?>