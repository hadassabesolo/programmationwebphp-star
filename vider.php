

<?php
// 1. Démarrer la session pour accéder aux données stockées
session_start();

// 2. Supprimer uniquement la variable 'panier'
// Cela vide la liste des articles sans déconnecter le caissier
if (isset($_SESSION['panier'])) {
    unset($_SESSION['panier']);
}

// 3. Rediriger immédiatement vers la page de scannage pour la vente suivante
header("Location: scanner.php");
exit();
?>