<?php session_start() ?>;
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>caissier</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            background-image: url("photo/1776866107195 (1).jpg");
        }
        
    .avatar {
        width: 180px;           /* Largeur du cercle */
        height: 180px;          /* Hauteur du cercle */
        background-color: #e0e0e0; /* Gris clair comme sur ta photo */
        border-radius: 50%;     /* Pour faire un cercle parfait */
        display: flex;          /* Pour centrer le caractère dedans */
        align-items: center;
        justify-content: center;
        margin: 20px auto;      /* Centre le cercle dans la page */
        font-size: 80px;        /* Taille du caractère Unicode */
        color: #757575;         /* Gris plus foncé pour le caractère */
    }

    #user{
        text-align: center;
        background-color: navajowhite;
        border: 1px solid aliceblue;
        padding: 20px;
        width: 300px;
        margin: auto;
        border-radius: 10px;
    }
</style>

</head>
<body >

<main>
    <form >
        <section id="user">
        <div class="avatar">
            
        <p>👤</p>
        </div>


        <div class="departement">
             <p>Nom de l'utilisateur : <?php echo  $_SESSION['caissier_nom'] ?></p>
             <p>Role de l'utilisateur : <?php echo  $_SESSION['caissier_role'] ?> </p>
             <p>Mot de passe : <?php echo   $_SESSION['caissier_mdp'] ?> </p>
             
             <p>Date : <?php echo $_SESSION['caissier_date'] ?> </p>
             <p>Statue : <?php echo $_SESSION['caissier_statut'] ?> </p>

            
             
        </div>
        </section>

         
    </form>

    <!-- </section> -->

</main>

</body>
</html>