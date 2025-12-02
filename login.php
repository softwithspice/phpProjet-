<?php

require "connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $log = $_POST["login"];
    $pwd = $_POST["pwd"];

    $reponse = $connexion->query('SELECT * FROM user');
    $found = false;
    
    while ($donnees = $reponse->fetch()) {
        $loginUser = $donnees['login'];
        $pwdUser = $donnees['mot_de_passe'];
        
        if ($log == $loginUser && $pwd != $pwdUser) {
            echo "Vérifier vos données";
            exit;
        } elseif ($log == $loginUser && $pwd == $pwdUser) {
            $found = true;
            session_start();
            $_SESSION['login'] = $loginUser;
            
            if ($donnees['role'] == "admin") {
                header("location:dashboard.php");
                exit;
            } elseif ($donnees['role'] == "etudiant") {
                header("location:changerPWD.php");
                exit;
            } elseif ($donnees['role'] == "enseignant") {
                header("location:changerPWD.php");
                exit;
            }
        }
    }
    
    if (!$found) {
        echo "Désolé, vous n'êtes pas inscrit<br>Contactez l'Admin";
    }
} else {
    // Si pas de POST, rediriger vers la page d'index
    header("location:index.php");
    exit;
}
  

      

