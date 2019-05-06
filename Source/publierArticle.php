<?php include('head.php');
require_once 'class/connectDB.php';


$db = new connectionDb();
$id = $_GET['id'];

$reponse = $db->db->prepare('UPDATE article SET statutArticle = 2 WHERE id_article = :id');
    $array = array(
        'id' => $id
    );
$reponse->execute($array);
$reponse->closeCursor();

// retour à l'index.php
header('Location: index.php');

?>

<?php include('footer.php')?>