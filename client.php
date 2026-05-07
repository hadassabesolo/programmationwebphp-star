

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement du patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="caisse">

    <main>
        <h1>Enregistrement du caissier</h1>
           
        <form action="facture.php" method="POST">
            <!-- n'allait le droit de s'enregistrer que celui qui ne se jamais identifier -->
            
            <label for="id">Nom du client :</label>
            <input type="text" id="nom" name="client" placeholder="client" required>

            <label for="mot">Postnom:</label>
            <input type="text" id="mot" name="postnom" placeholder="son postnom" required>

            <label for="role">Numero:</label>
            <input type="text" id="roles" name="num" required>

           

            <label for="date">Adresse :</label>
            <input type="text" id="dates" name="adresse" placeholder="adresse" required>

            <button type="submit" class="btn">envoyer</button>
          
             



            <!-- Ce lien est temporaire , elle disparaitra lorsque tous deviendra automatique cad l'utilisateur sera rediger automatiquement apres s'
             etre enregistrer -->
             
        </form>
    </main>

</body>
</html>