<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require "connexion.php";
$reponse = $connexion->query('SELECT * FROM etudiant');
echo
"
<table style='border:2px solid black'>
<tr><th style='border:2px solid black'>NCE</th>
<th style='border:2px solid black'>Nom</th>
<th style='border:2px solid black'>Prénom</th>
<th style='border:2px solid black'>Classe</th>
<th colspan='2' style='border:2px solid black'>Action</th></tr>";
while ($donnees = $reponse->fetch())
{
    echo"<tr ><td style='border:2px solid black'>". $donnees['NCE']."</td>
    <td style='border:2px solid black'>".$donnees['nom']."</td>
    <td style='border:2px solid black'>".$donnees['prenom']."</td>
    <td style='border:2px solid black'>".$donnees['classe']."</td>
    <td style='border:2px solid black'><a href ='supprimer_etudiant.php?nce=".$donnees['NCE']."'>Supprimer</a></td>
    <td style='border:2px solid black'><a href ='modifier_etudiant.php?nce=".$donnees['NCE']."'>Modifier</a></td></tr>";

}
echo"</table>";
  echo"<button type='reset' onclick=window.location.href='logout.php' >Log Out</button></div>";