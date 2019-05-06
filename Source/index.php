<?php include('head.php')?>
<main>
    <div class="container-fluid p-5">
        <h2 class="text-center p-2">Les derniers articles</h2>
        <div class="d-flex justify-content-center flex-wrap">
            <?php require_once 'class/connectDB.php';
                require_once 'class/article.php';
            $db = new connectionDb();
                $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE statutArticle = 2 ORDER BY date_article ASC');
                while ($donnees = $reponse->fetch())
                    {
                    $article[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['prenom'], $donnees['id_article'])

                ;}
                for($x=0; $x<=(count($article)-1); $x++){
                    $article[$x]->createArticle();
                }
                    
                    ?>
        </div>
    </div>
    <div class="zonerandom pt-5 pb-5">
        <h2 class=" text-center text-white-50">Un article au hasard</h2>
        <div class="container">
            <?php
                require_once 'class/connectDB.php';
                require_once 'class/article.php';

                $db = new connectionDb();

                $db = new connectionDb();
                        $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE statutArticle = 2 ORDER BY RAND () LIMIT 1');
                        while ($donnees = $reponse->fetch())
                            {
                                $article1[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['pseudo'], $donnees['id_article'])

                            ;}
                            for($x=0; $x<=(count($article1)-1); $x++){
                                        $article1[$x]->randomArticle();
                            };?>
        </div>

    </div>
</main>

<?php include('footer.php')?>