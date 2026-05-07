
<?php
session_start(); // On démarre la session pour mémoriser le panier

$code_scanne = $_GET['code']; // On récupère le code envoyé par le scanner
$produit_trouve = null;

// 1. On ouvre le fichier produits.txt en mode lecture ('r')
$fichier = fopen("produits.txt", "r");

if ($fichier) {
    // 2. On lit le fichier ligne par ligne
    while (($ligne = fgets($fichier)) !== false) {
        // On sépare la ligne en 3 morceaux grâce au signe "|"
        $infos = explode("|", trim($ligne));
        
        $code_dans_fichier = $infos[0];
        $nom_produit = $infos[1];
        $prix_produit = $infos[2];

        // 3. Est-ce que le code scanné est le même que dans cette ligne ?
        if ($code_scanne == $code_dans_fichier) {
            $produit_trouve = [
                'nom' => $nom_produit,
                'prix' => $prix_produit
            ];
            break; // On a trouvé, on arrête de chercher
        }
    }
    fclose($fichier);
}



// 4. Si on a trouvé le produit, on l'ajoute au panier (dans la Session)
if ($produit_trouve) {
    $_SESSION['panier'][] = $produit_trouve;
    echo "Produit ajouté : " . $produit_trouve['nom'];
} else {
    echo "Désolé, ce produit n'est pas dans le stock.";
}

// 5. On repart vers la page de scan après 2 secondes pour continuer
header("refresh:2;url=scanner.php");


?>