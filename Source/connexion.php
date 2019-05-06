<?php
include('head.php');
?>
<div class="container-fluid">
    <h1 class="text-center text-info font-weight-light m-3">Connexion</h1>
</div>
<div class="d-flex justify-content-center">
        <!-- formulaire d'inscrition -->
        <form method="POST" action="connectSuccess.php" class="p-3">
            <div class="form-row">
                <div class="form-group col-sm">
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" name="pseudo" placeholder="pseudo" required>
                        </div>
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <input type="password" class="form-control" placeholder="mot de passe" name="mdp" required>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="connexion">Se connecter</button>
        </form>
</div>




<?php
include('footer.php');
?>