<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les etudiants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <div>
            <div class="button">
                <div><a href="ajouter_etudiant.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a></div> 
                <div><a href="import_etudiant.php" class="Btn_add"> <img src="images/plus.png"> importer</a></div>    
            </div>
            <table >
                <tr id="items">
                    <th>Matricule</th>
                    
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Lieu de naissance</th>
                    <th>Date de naissance</th>
                    <th>Semestre</th>
                    <th>Année</th>
                    <th>E-mail</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php 
                    include_once "connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM etudiant");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des enseignants ajouter !" ;
                        
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['matricule']?></td>
                                <td><?=$row['semestre']?></td>
                                <td><?=$row['annee']?></td>
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['Date_naiss']?></td>
                                <td><?=$row['lieu_naiss']?></td>
                                <td><?=$row['login']?></td>
                                <td><a href="modifier_etudiant.php?id_etud=<?=$row['id_etud']?>"><img title="Modifier" class="img" src="images/pen.png"></a></td>
                                <td><a href="supprimer_etudiant.php?id_etud=<?=$row['id_etud']?>"onclick="return confirm(`voulez-vous vraiment supprimé ce etudiant ?`)"><img title="Supprime" class="img" src="images/trash.png"></a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>