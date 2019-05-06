<?php
class article {
    //declaration variable
    private $titre;
    private $sous_titre;
    private $contenu;
    private $date;
    private $statut;
    private $idMembre;
    private $idArticle;

    // construction de l'objet
    public function __construct($titre, $sous_titre, $contenu, $date, $statut, $idMembre, $idArticle){

        $this->titre = $titre;
        $this->sous_titre = $sous_titre;
        $this->contenu = $contenu;
        $this->date = $date;
        $this->statut = $statut;
        $this->idMembre = $idMembre;
        $this->idArticle = $idArticle;
    }
    //fonction création de la card
    public function createArticle(){
        echo '
            <div class="d-flex">
                <div class="card boxPost shadowBox m-2">
                    <div class="card-body">
                        <p class="text-muted lead">'.$this->date.'</p>
                        <h4 class="card-title">'.$this->titre.'</h4>
                        <h6 class="card-subtitle mb-2 text-muted">'.$this->sous_titre.'</h6>
                        <p class="card-text text-truncate">'.$this->contenu.'</p>
                        <a href="pageArticle.php?id='.$this->idArticle.'" class="card-link">Lire la suite</a>
                        <p class="card-text lead">'.$this->idMembre.'</p>
                    </div>
                </div>
            </div>';
    }

    // article affiché en zone admin
    public function validerArticle(){
        echo '
        <div class="d-flex flex-column">
            <div class="card boxPost shadowBox m-2">
            <h4 class="pl-2">Proposé par '.$this->idMembre.'</h4>
            <h5 class="pl-3">le '.$this->date.'</h5>
                <div class="card-body">                        
                    <h4 class="card-title">'.$this->titre.'</h4>
                    <h6 class="card-subtitle mb-2 text-muted">'.$this->sous_titre.'</h6>
                    <p class="card-text text-truncate">'.$this->contenu.'</p>
                    <a href="modifArticle.php?id='.$this->idArticle.'" class="btn btn-outline-primary">modifier</a>
                    <a href="supprimerArticle.php?id='.$this->idArticle.'" class="btn btn-outline-danger">supprimer</a>
                </div>
            </div>
        </div>';

    }

    public function modifArticle(){
        echo '
        <div class="d-flex flex-column">
            <div class="card boxPost shadowBox m-2">
            <h5 class="pl-3 pt-2">le '.$this->date.'</h5>
                <div class="card-body">                        
                    <h4 class="card-title">'.$this->titre.'</h4>
                    <h6 class="card-subtitle mb-2 text-muted">'.$this->sous_titre.'</h6>
                    <p class="card-text text-truncate">'.$this->contenu.'</p>
                    <a href="modifArticle.php?id='.$this->idArticle.'" class="btn btn-outline-primary">modifier</a>
                    <a href="supprimerArticle.php?id='.$this->idArticle.'" class="btn btn-outline-danger">supprimer</a>
                    <p class="text-muted">article numéro '.$this->idArticle.'</p>
                </div>
            </div>
        </div>
        ';

    }
    
    public function afficherArticle(){
        echo '
        <div class="container justify-content-center pt-5">
            <div class="jumbotron">
                <h1 class="display-3">'.$this->titre.'</h1>
                <p class="lead">'.$this->sous_titre.'</p>
                <hr class="my-4">
                <p class="lead text-dark">'.$this->contenu.'</p>
                <p class="lead">Le '.$this->date.' par '.$this->idMembre.'</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn shadowBox btn-warning" href="index.php" role="button">retour à l\'accueil</a>
        </div>'

        ;
    }
    
    public function randomArticle(){
        echo '
        <div class="container justify-content-center pt-5">
            <div class="jumbotron">
                <h1 class="display-3">'.$this->titre.'</h1>
                <p class="lead">'.$this->sous_titre.'</p>
                <hr class="my-4">
                <p class="lead text-dark">'.$this->contenu.'</p>
                <p class="lead">Le '.$this->date.' par '.$this->idMembre.'</p>
            </div>
        </div>'

        ;
    }

}