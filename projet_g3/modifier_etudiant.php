<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
                <?php

        function test_input($data){
            $data = htmlspecialchars($data);
            $data = trim($data);
            $data = htmlentities($data);
            $data = stripcslashes($data);

            return $data;
        }

        include_once "connexion.php";
        $id_etud = $_GET['id_etud'];
        $req = mysqli_query($conn , "SELECT * FROM etudiant WHERE id_etud = $id_etud");
        $row = mysqli_fetch_assoc($req);

        // $matricule = test_input($_POST['matricule']);
        // $semestre = test_input($_POST['semestre']);
        // $annee = test_input($_POST['annee']);
        // $nom =  test_input($_POST['nom']);
        // $prenom = test_input($_POST['prenom']); 
        // $Date_naiss = test_input($_POST['Date_naiss']); 
        // $lieu_naiss =  test_input($_POST['lieu_naiss']);
        // $login =  test_input($_POST['login']);
        // $pwd =  test_input($_POST['pwd']);
        // $id_role =  test_input($_POST['id_role']);
        // $active =  test_input($_POST['active']);
        if(isset($_POST['button'])){ 
            test_input(extract($_POST));
        if( isset($matricule) && isset($semestre)  && isset($annee) && isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login) ){
            $req = mysqli_query($conn, "UPDATE etudiant SET  matricule = '$matricule' , semestre = '$semestre' , annee = '$annee' , nom = '$nom' , prenom = '$prenom', Date_naiss = '$Date_naiss', lieu_naiss = '$lieu_naiss', login = '$login' WHERE id_etud = $id_etud");
            if($req){
                header("location: etudiant.php");
            }else {
                $message = "etudiant non modifié";
            }

        }else {
            $message = "Veuillez remplir tous les champs !";
        }
        }

        ?>

        <div class="form">
        <a href="les_joueurs.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Modifier l'etudiant : <?=$row['nom']?> </h2>
        <p class="erreur_message">
        <?php 
            if(isset($message)){
                echo $message ;
            }
        ?>
        </p>
        <form action="" method="POST">
        <label>Matricule</label>
        <input type="number" name="matricule"  value="<?=$row['matricule']?>">
        <label>Nom</label>
        <input type="text" name="nom" value="<?=$row['nom']?>">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?=$row['prenom']?>">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss" value="<?=$row['lieu_naiss']?>">
        <label>Date de naissance</label>
        <input type="date" name="Date_naiss" value="<?=$row['Date_naiss']?>">
        <label>Semestre</label>
        <input type="text" name="semestre"  value="<?=$row['semestre']?>">
        <label>Année</label>
        <input type="text" name="annee"  value="<?=$row['annee']?>">
        <label>E-mail</label>
        <input type="email" name="login" value="<?=$row['login']?>">
        <input type="submit" value="Modifier" name="button">
        </form>
    </div>

    </div>
</body>
</html>