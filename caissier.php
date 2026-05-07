
<?php
session_start();

$nom_saisi = $_POST['nom'];
$mdp_saisi = $_POST['mdp'];
$role_saisi = $_POST['role'];
$date = $_POST['date_arrive'];

$autorise = false;

// 1. On ouvre le fichier des caissiers
$fichier = fopen("liste_caissier.txt", "r");

if ($fichier) {
    while (($ligne = fgets($fichier)) !== false) {
        // On sépare les infos de la ligne
        $infos = explode("|", trim($ligne));
        
        $nom_stocke = $infos[0];
        $mdp_stocke = $infos[1];
        $role_stocke = $infos[2];
        $date = $infos[3];

        // $hacke=password_hash($mdp_stocke, PASSWORD_DEFAULT);



        $statut = $infos[4];

        // 2. On vérifie si le nom et le mot de passe correspondent
        if ($nom_saisi == $nom_stocke && $mdp_saisi == $mdp_stocke) {
            // On vérifie aussi si le caissier est bien "actif"
            if ($statut == "actif") {
                $autorise = true;
                // On enregistre son nom en session pour s'en souvenir
                $_SESSION['caissier_nom'] = $nom_stocke;
                $_SESSION['caissier_mdp'] = $mdp_stocke; 
                $_SESSION['caissier_role'] = $role_stocke; 
                $_SESSION['caissier_date'] = $date; 
                $_SESSION['caissier_statut'] = $statut; 



                break;
            }
        }
    }
    fclose($fichier);
}

// 3. Verdict
if ($autorise) {
    // Succès : on l'envoie vers la page de scan
    header("Location: option.html");
} else {
    // Échec : on le renvoie au login avec un message d'erreur
    echo "Identifiants incorrects ou compte inactif !";
    header("refresh:2;url=index.html");
}
?>

