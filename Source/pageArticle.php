<?php include('head.php');?>
<main>
<?php
    require_once 'class/connectDB.php';
    require_once 'class/article.php';

    $db = new connectionDb();
    $id = $_GET['id'];

    $db = new connectionDb();
            $reponse = $db->db->query('SELECT * FROM article NATURAL JOIN membre WHERE id_article ='.$id.'');
            while ($donnees = $reponse->fetch())
                {
                    $article1[] = new article($donnees['titre'], $donnees['sous_titre'], $donnees['contenu'], $donnees['date_article'], $donnees['statutArticle'], $donnees['pseudo'], $donnees['id_article'])

                ;}
                for($x=0; $x<=(count($article1)-1); $x++){
                            $article1[$x]->afficherArticle();
                };?>
</main>

<?php include('footer.php');?>
