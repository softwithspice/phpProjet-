<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ajouter étudiant

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
    <form action="" method="get">
        <h1>
            Ajouter un étudiant
        </h1>
    <label for="">
        NCE:
    </label> <br>
    <input type="number" name="nce" id=""> <br>
    <label for="">
        Nom:
    </label><br>
    <input type="text" name="nom" id=""> <br>
    <label for="">
        Prenom:
    </label> <br>
    <input type="text" name="prenom" id=""> <br>
    <label for="">
        Classe:
    </label> <br>
    <input type="text" name="classe" id=""> <br>
    <div class="buttons">
    <button type="submit">Ajouter étudiant</button>

</form>
</body>
</html>

<?php
require "connexion.php";
if (isset($_GET["nce"])){
$nce=$_GET["nce"];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$classe=$_GET['classe'];

// $reponse = $connexion->exec('INSERT INTO `etudiant`
//  VALUES ($nce,$nom,$prenom,$classe)');
$stmt = $connexion->prepare("INSERT INTO etudiant (nce, nom, prenom, classe) 
                                 VALUES (?, ?, ?, ?)");
    
    $result = $stmt->execute([$nce, $nom, $prenom, $classe]);

if($result){
    echo"<p>ajout éffectuer avec succées</p>";
}
}
