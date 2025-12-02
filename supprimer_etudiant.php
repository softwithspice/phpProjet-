<?php
require "connexion.php";

// Vérifier si nce est passé via GET (lien) ou POST (formulaire)
if (!isset($_GET['nce']) && !isset($_POST['nce'])) {
    echo "<p>Erreur: Aucun étudiant sélectionné</p>";
    echo "<a href='liste_etudiants.php'>Retour à la liste</a>";
    exit;
}

$nce = isset($_GET['nce']) ? $_GET['nce'] : $_POST['nce'];

// Récupérer l'étudiant
$rqtEtudiant = $connexion->prepare("SELECT * FROM etudiant WHERE NCE = ?");
$rqtEtudiant->execute([$nce]);
$idUser = $rqtEtudiant->fetch();

if ($idUser) {
    // Supprimer l'étudiant
    $rqtDeleteEtud = $connexion->prepare("DELETE FROM etudiant WHERE NCE = ?");
    $reponseetud = $rqtDeleteEtud->execute([$nce]);
    
    // Supprimer l'utilisateur associé
    $rqtUser = $connexion->prepare('DELETE FROM user WHERE id = ?');
    $reponseUser = $rqtUser->execute([$idUser['user_id']]);

    if ($reponseetud && $reponseUser) {
        echo "<p>Suppression effectuée</p>";
    } else {
        echo "<p>Erreur lors de la suppression</p>";
    }
} else {
    echo "<p>Étudiant non trouvé</p>";
}

echo "<a href='liste_etudiants.php'>Retour à la liste</a>";

