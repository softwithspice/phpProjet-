<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
require "connexion.php";

if(isset($_POST['login']) && isset($_POST['pwd'])){
    $login=$_POST['login'];
    $pwd=$_POST['pwd'];
$req=$connexion->prepare('select * from user where login=? and mot_de_passe=? ');
 $rep=$req->execute([$login,$pwd]);
$donnees=$req->fetch();
   if($donnees){
        $idUser = $donnees['id'];
    }
}


?>
    <form action="" method="POST">
        <h1>
           Modifier vos données
        </h1>
         <input type="hidden" name="login" value="<?= $login ?>">
    <input type="hidden" name="pwd" value="<?= $pwd ?>">
    <label for="">
        Login:
    </label> <br>
    <input type="text" name="newlogin" id="" value=""> <br>
    <label for="">
        Mot de passe:
    </label><br>
    <input type="password" name="newpwd" id="" value=""> <br>
    <div class="buttons">
    <button type="submit">Changer mes données</button>

</form>
</body>

<?php
if(isset($_POST['newlogin']) && isset($_POST['newpwd']) && isset($idUser)){
    $newlogin=$_POST['newlogin'];
$newpwd=$_POST['newpwd'];

    $req=$connexion->prepare('update user set login=? ,mot_de_passe=? where id=? ');
$rep=$req->execute([$newlogin,$newpwd,$idUser]);
if ($rep){
    echo " modification apportée avec succés!";
}

}

  echo"<button type='reset' onclick=window.location.href='logout.php' >Log Out</button></div>";

?>


</html>  