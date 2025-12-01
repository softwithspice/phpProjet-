<?php

require "connexion.php";
$log=$_POST["login"];
$pwd=$_POST["pwd"];

$reponse = $connexion->query('SELECT * FROM user');
while ($donnees = $reponse->fetch())
{ 
    // session_start();
    $loginUser=$donnees ['login'];
    $pwdUser=$donnees['mot_de_passe'];
    if ($log==$loginUser && $pwd!=$pwdUser){
   echo " vérifier vos données ";
   exit;
    }
     else if ($log==$loginUser && $pwd==$pwdUser){
               if ($donnees['role']=="admin"){
               header("location:dashboard.php");
               exit;
                                             }
          elseif($donnees['role']=="etudiant") {
          header("location:changerPWD.php?login=". $loginUser."&pwd=".$pwdUser);
                          exit;
                         }
                         elseif($donnees['role']=="enseignant"){
                header("location:changerPWD.php?login=". $loginUser."&pwd=".$pwdUser);
exit;

                         }
         
         }
    }
     echo"désolé vous étes pas inscrit <br> 
                              conntacter Admin";
  

      

