<?php
    require_once('../Models/Livre.php');
    $livres = new Livre();
    $livres = $livres->getLivres();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body>

    <div class="library-container">
        <h1 class="library-title">Bibliothèque </h1>
        <a href="./ajouterLivre.php"><button name="addlivre" type="submit" class="submit-btn">Ajouter le livre</button></a>

        <table class="library-table">
            
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Date d'ajout</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($livres->num_rows > 0) {
                while($row = $livres->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td >" . $row['titre'] . "</td>";
                    echo "<td >" . $row['auteur'] . "</td>";
                    echo "<td >" . $row['categorie'] . "</td>";
                    echo "<td >" . $row['date_ajout'] . "</td>";
                        if( $row['disponible'] == 1){ 
                            echo "<td > <span class='status available'> Disponible</span> </td>" ;
                        }else{ 
                            echo "<td > <span class='status unavailable'> Indisponible</span> </td>" ;
                        }
                    echo "</tr>";
                }              
                } else {
                    echo "<tr><td colspan='5' class='text-center py-2'>No Livre Found</td></tr>";
                }      
                $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>