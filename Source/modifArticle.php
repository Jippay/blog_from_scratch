<?php include('head.php')?>
<main>
    <div class="container">
        <h1 class="text-center">Modifier un article</h1>
    </div>
    <?php require_once 'class/connectDB.php';
    $id = $_GET['id'];
    $db = new connectionDb();
    $reponse = $db->db->prepare('SELECT * FROM article NATURAL JOIN membre WHERE id_article = ?');
    $reponse->execute(array($_GET['id']));
    $donnees = $reponse->fetch();
    ?>
    <div class="d-flex justify-content-center">
            <form method="POST" action="modifier.php?id=<?php echo $_GET['id']?>" class="p-3">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="titre">Nouveau titre ?</label>
                        <input type="text" class="form-control" name="titre" value="<?php echo $donnees['titre']?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="sous_titre">corriger ou modifier le sous-titre</label>
                        <textarea class="form-control" name="sous_titre"><?php echo $donnees['sous_titre']?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="contenu">corriger ou modifier le contenu</label>
                        <textarea class="form-control" name="contenu" row="10"><?php echo $donnees['contenu']?></textarea>
                    </div>
                </div>
                <button class="btn btn-secondary shadowBox" type="submit" name="modifier">modifier l'article</button>
            </form>
    </div>
</main>



<?php include('footer.php')?>