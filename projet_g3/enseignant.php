<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les enseignants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
    <div>
            <a href="ajouter_enseignant.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
            
            <table >
                <tr id="items">
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Rôle</th>
                    <th>Active</th>
                    <th colspan="2">action</th>
                </tr>
                <?php 
                    include_once "connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM enseignant");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des enseignants ajouter !" ;
                        
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['code']?></td>
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['Date_naiss']?></td>
                                <td><?=$row['lieu_naiss']?></td>
                                <td><?=$row['login']?></td>
                                <td><?=$row['pwd']?></td>
                                <td><?=$row['id_role']?></td>
                                <td><?=$row['active']?></td>
                                <td><a href="modifier_enseignant.php?id_ens=<?=$row['id_ens']?>"><img title="Modifier" class="img" src="images/pen.png"></a></td>
                                <td><a href="supprimer_enseignant.php?id_ens=<?=$row['id_ens']?>"onclick="return confirm(`voulez-vous vraiment supprimé cet enseignant ?`)"><img title="Supprime" class="img" src="images/trash.png"></a></td>
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