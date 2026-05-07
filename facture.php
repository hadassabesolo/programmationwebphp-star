
<?php
session_start();


$_SESSION['client']=isset($_POST["client"])? $_POST["client"]: "vide";
 
$_SESSION['postnom']=isset($_POST["postnom"])? $_POST["postnom"]: "vide";
 
$_SESSION['num']=isset($_POST["num"])? $_POST["num"]: "vide";
 


$total_ht = 0;
$tva_taux = 0.18; // 18% comme demandé

// On vérifie si le panier existe
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture Finale</title>
    
    <style>
        body { font-family: 'Courier New', Courier, monospace; margin: 50px;
        background-image: url("photo/1776866107195 (1).jpg"); 
            }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #000; padding: 10px; text-align: left; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }
        .facture-header { margin-bottom: 30px; }



    body.caisse main {
    background-color: rgba(255, 255, 255, 0.95);
    
    padding: 40px 50px;
    max-width: 600px;
    margin: 50px auto;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
}
        
    </style>
</head>
<body class="caisse">
    <main>

    <div class="facture-header">
        <h1>FACTURE</h1>
        <p>Date : <?php echo date('d/m/Y H:i'); ?></p>
        <p>Caissier : <?php echo $_SESSION['caissier_nom']; ?></p>

        <p>Client : <?php echo $_SESSION['client']=isset($_POST["client"])? $_POST["client"]: "vide"; ?></p>
        <p>Postnom : <?php echo $_SESSION['postnom']=$_POST["postnom"]; ?></p>
        <p>Numero : <?php echo $_SESSION['num']=$_POST["num"]; ?></p>
        <p>Adresse : <?php echo $_SESSION['adresse']=$_POST["adresse"]; ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Prix unit. HT</th>
                <th>Qté</th>
                <th class="text-right">Sous-total HT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($panier as $article) : 
                // On récupère ou on fixe la quantité (par défaut 1 si non précisé)
                $qte = isset($article['quantite']) ? $article['quantite'] : 1;
                $sous_total = $article['prix'] * $qte;
                $total_ht += $sous_total;
            ?>
            <tr>
                <td><?php echo $article['nom']; ?></td>
                <td><?php echo number_format($article['prix'], 0, ',', ' '); ?> CDF</td>
                <td><?php echo $qte; ?></td>
                <td class="text-right"><?php echo number_format($sous_total, 0, ',', ' '); ?> CDF</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // Calculs finaux
    $montant_tva = $total_ht * $tva_taux;
    $net_a_payer = $total_ht + $montant_tva;
    ?>

    <div style="margin-top: 20px; float: right; width: 300px;">
        <table>
            <tr>
                <td class="bold">Total HT</td>
                <td class="text-right"><?php echo number_format($total_ht, 0, ',', ' '); ?> CDF</td>
            </tr>
            <tr>
                <td class="bold">TVA (18%)</td>
                <td class="text-right"><?php echo number_format($montant_tva, 0, ',', ' '); ?> CDF</td>
            </tr>
            <tr>
                <td class="bold" style="font-size: 1.2em;">Net à payer</td>
                <td class="text-right bold" style="font-size: 1.2em;">
                    <?php echo number_format($net_a_payer, 0, ',', ' '); ?> CDF
                </td>
            </tr>
        </table>
    </div>

    <div style="clear: both; padding-top: 50px;">
        <button onclick="window.print()">Imprimer la facture</button>
        <a href="vider.php">Nouvelle vente</a>
    </div>
    </main>
</body>
</html>