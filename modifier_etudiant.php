<?php
session_start();
require "connexion.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// Récupérer le NCE de l'étudiant - support both GET (for initial load) and POST (for form submission)
$nce = isset($_GET['nce']) ? $_GET['nce'] : (isset($_POST['nce']) ? $_POST['nce'] : null);

if (!$nce) {
    header("Location: liste_etudiants.php");
    exit;
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe = $_POST['classe'];

    $stmt = $connexion->prepare("UPDATE etudiant SET nom = ?, prenom = ?, classe = ? WHERE NCE = ?");

    if ($stmt->execute([$nom, $prenom, $classe, $nce])) {
        header("Location: liste_etudiants.php?success=update");
        exit;
    } else {
        $error = "Erreur lors de la modification";
    }
}

// Récupérer les données de l'étudiant
$stmt = $connexion->prepare("SELECT * FROM etudiant WHERE NCE = ?");
$stmt->execute([$nce]);
$etudiant = $stmt->fetch();

if (!$etudiant) {
    header("Location: liste_etudiants.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier l'étudiant</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="modifier_etudiant.php">
            <input type="hidden" name="nce" value="<?php echo htmlspecialchars($etudiant['NCE']); ?>">
            <div class="mb-3">
                <label for="nce" class="form-label">NCE</label>
                <input type="text" class="form-control" id="nce" value="<?php echo htmlspecialchars($etudiant['NCE']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="classe" class="form-label">Classe</label>
                <input type="text" class="form-control" id="classe" name="classe" value="<?php echo htmlspecialchars($etudiant['classe']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="liste_etudiants.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>