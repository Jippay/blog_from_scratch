<?php
include('head.php');
?>
<main>
    <div class="p-3">
    <h1 class='text-center text-white'>Créer un article</h1>
    <h2 class="p-2 lead text-dark text-center">Ajouter un titre, un sous-titre et le contenu de votre article ! Il sera peut-etre publié, qui sait ...</h2>
        <div class="d-flex justify-content-center">
            <form method="POST" action="postBDD.php" class="p-3">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="titre">titre de votre article</label>
                        <input type="text" class="form-control" name="titre" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="sous_titre">sous-titre ou petit texte d'intro</label>
                        <textarea class="form-control" name="sous_titre"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="contenu">contenu</label>
                        <textarea class="form-control" name="contenu" row="10" required></textarea>
                    </div>
                </div>
                <button class="btn btn-secondary shadowBox" type="submit" name="proposer">proposer l'article</button>
            </form>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>