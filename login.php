<?php

require "connexion.php";
$log=$_GET["login"];
$pwd=$_GET["pwd"];

$reponse = $connexion->query('SELECT * FROM user');
while ($donnees = $reponse->fetch())
{ 
    session_start();

    // console.log($donnees);
    $loginAdmin=$donnees ['login'];
    $pwdAdmin=$donnees['mot_de_passe'];
    if ($log==$loginAdmin && $pwd!=$pwdAdmin){
   echo " vérifier vos données ";
    }
         else if ($log==$loginAdmin && $pwd==$pwdAdmin){
               if ($donnees['role']=="admin"){
       header("location:menu.php");
}
elseif($donnees['role']=="étudiant")
          {
        echo"hi étudiant"; 
    }
         }
    }
    echo"<button type='reset' onclick=window.location.href='logout.php' >Log Out</button></div>";

      

