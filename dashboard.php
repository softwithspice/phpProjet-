<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <style>
        div{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div >
    <a href="ajoute_etudiant.php">Ajouter etudiant</a>
    <a href="ajouter_enseignant.php">Ajouter enseignant</a>
    <a href="liste_etudiants.php">Consulter liste etudiant</a>
    <?php
      echo"<button type='reset' onclick=window.location.href='logout.php' >Log Out</button></div>";
    ?>
      </div>
</body>
</html>