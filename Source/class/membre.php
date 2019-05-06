<?php
class membre {

    private $idMembre;
    private $prenom;
    private $pseudo;
    private $email;
    private $date;
    private $statut;

    public function __construct($idMembre, $prenom, $pseudo, $email, $date, $statut){
        
        $this->idMembre = $idMembre;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->date = $date;
        $this->statut = $statut;
    }

    public function ficheMembre(){
        echo'
            <div class="d-flex flex-column">
                <div class="card boxPost shadowBox m-2" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">'.$this->pseudo.'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Prenom : '.$this->prenom.'</h6>
                        <p class="card-text">email : '.$this->email.'</p>
                        <p class="card-text">Inscrit le : '.$this->date.'</p>
                        <p class="card-text">membre numéro :'.$this->idMembre.'</p>
                        <a href="supprimMembre.php?id='.$this->idMembre.'" class="btn btn-outline-danger">Supprimer ce membre ?</a>
                    </div>
                </div>
            </div>
            ';
    }

}?>