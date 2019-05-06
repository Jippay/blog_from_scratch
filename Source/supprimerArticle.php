<?php include('head.php');
$id = $_GET['id'];?>

<main class='p-5'>
    <div class="d-flex justify-content-center m-5">
        <div class="card border-danger boxPost shadowBox m-2" style="width: 16rem;">
            <div class="card-body">
                <h5 class="card-title">ATTENTION</h5>
                <p class="card-text">Vous êtes sur le point de supprimer cet article, en êtes vous sûr ?</p>
                <?php echo '<a href="confirmSuppArticle.php?id='.$id.'" class="btn btn-outline-danger">Supprimer cet article !</a>';?>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <a class="btn btn-info shadowBox" href="espaceAdmin.php" role="button">retour à l'espace admin</a>
    </div>
</main>
<?php include('footer.php')?>