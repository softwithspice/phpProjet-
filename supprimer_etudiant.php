<?php
require "connexion.php";
$rqtEtudiant = $connexion->prepare("select * from etudiant 
                                where NCE=?");
  $nce = $_POST['nce'];

    $result = $rqtEtudiant->execute([$nce]);
$idUser=$rqtEtudiant->fetch();
if($result){
$rqtEtudiant = $connexion->prepare("delete from etudiant 
                                where NCE=?");

   $rqtUser=$connexion->prepare('delete from user where id=?');
   $reponseetud=$rqtEtudiant->execute([$nce]);
   $reponseUser=$rqtUser->execute([$idUser['user_id']]);

if($reponseetud && $reponseUser){
    echo"<p>suppression effectué</p>";
}

}

