<?php
require "connexion.php";
$rqt = $connexion->prepare("delete from etudiant 
                                where NCE=?");
    $nce = $_GET['nce'];
    $result = $rqt->execute([$nce]);

if($result){
    echo"<p>suppression effectué</p>";
}

