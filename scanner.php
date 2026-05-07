
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Caisse - Scan</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    
    <style>
    /* On centre tout le contenu de la page */
    body {
        background-image: url("photo/1776866107195 (1).jpg");
        display: flex;
        flex-direction: column; /* Aligne les éléments de haut en bas */
        align-items: center;    /* Centre horizontalement */
        justify-content: center; /* Centre verticalement */
        min-height: 100vh;      /* Prend toute la hauteur de l'écran */
        margin: 0;
        background-color: #f4f4f9; /* Un petit gris clair pour le fond */
        font-family: Arial, sans-serif;
    }

    /* On stylise le cadre de la caméra */
    #lecteur-camera {
        width: 100%;
        max-width: 400px; /* On limite la largeur pour que ça reste beau sur PC */
        border: 5px solid #333;
        border-radius: 15px; /* Bords arrondis */
        overflow: hidden;    /* Pour que la vidéo ne dépasse pas des bords arrondis */
        box-shadow: 0 10px 25px rgba(0,0,0,0.2); /* Une petite ombre portée */
        background-color: white;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    #resultat {
        margin-top: 20px;
        color: #555;
    }
</style>


</head>
<body class="camera">
    <h1>Caisse du Supermarché</h1>
    <p>Passez le code-barres devant la caméra :</p>

    <div id="lecteur-camera" style="width: 500px;"></div>

    <script>
        function onScanSuccess(decodedText) {
            // Dès qu'on trouve un code, on l'envoie à la page PHP
            // Exemple : ajouter_au_panier.php?code=12345678
            window.location.href = "traitement_scanne.php?code=" + decodedText;
        }

        // On lance le scanner
        let html5QrcodeScanner = new Html5QrcodeScanner("lecteur-camera", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
<?php
    echo "<br><br>";
    echo "<a href='scanner.php' style='padding:10px; background:blue; color:white;'>Scanner un autre article</a>";
    echo " ou ";
    echo "<a href='client.php' style='padding:10px; background:green; color:white;'>
    Enregistrer le client</a>";

?>




</body>
</html>