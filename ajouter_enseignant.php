<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ajouter enseignant

    </title>
</head>
<style>
    label
    {
        font-weight: bold;
      font-size: 30px;
    }
    form{
        width: 20%;
        margin-left: 25%;
        background-color: rgb(66, 94, 95,0.5);
        border-radius: 10px;
        padding: 10%;
    }
    input{
        border:2px rgb(24, 24, 133) solid;
        border-radius: 5px;
        width: 100%;
        height: 25px;
    }
    button{
       height: 30px;
       padding: 5px;
       margin-top: 5px;
       margin-left: 3px;
       font-weight: bold;
     
       
    }
    h1{
        color: whitesmoke;
        text-align: center;
       
    }
    .buttons{
  margin-left: 30%;
    }
</style>
<body>
    <form action="" method="post">
        <h1>
            Ajouter un enseignant
        </h1>
    <label for="">
        CIN:
    </label> <br>
    <input type="number" name="cin" id=""> <br>
    <label for="">
        Nom:
    </label><br>
    <input type="text" name="nom" id=""> <br>
    <label for="">
        Prenom:
    </label> <br>
    <input type="text" name="prenom" id=""> <br>
    <div class="buttons">
    <button type="submit">Ajouter enseignant</button>

</form>
</body>
</html>

<?php
require "connexion.php";
if (isset($_POST["cin"])){
$cin=$_POST["cin"];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];

$rqtUser=$connexion->prepare("insert into user (login,mot_de_passe,role) values (?,?,?)");
$resultUser=$rqtUser->execute([$nom,$nom.$prenom,"enseignant"]);
if ($resultUser){
    $idUser=$connexion->lastInsertId();
    $rqtensg = $connexion->prepare("INSERT INTO enseignant (cin, nom, prenom,user_id) 
                                 VALUES (?, ?, ?,?)");
    
    $resultensg = $rqtensg->execute([$cin, $nom, $prenom,$idUser]);

if($resultensg){
    echo"<p>ajout éffectuer avec succées</p>";
}
}


}
  echo"<button type='reset' onclick=window.location.href='logout.php' >Log Out</button></div>";