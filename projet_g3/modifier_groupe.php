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

        include_once "connexion.php";
        $id_groupe = $_GET['id_groupe'];
        $req = mysqli_query($conn , "SELECT * FROM groupe WHERE id_groupe = '$id_groupe'");
        $row = mysqli_fetch_assoc($req);


        if(isset($_POST['button'])){ 
        extract($_POST);
        if( isset($groupe_cm) && isset($groupe_tp) && isset($filiere) ){
            $req = mysqli_query($conn, "UPDATE groupe SET  groupe_cm = '$groupe_cm' , groupe_tp = '$groupe_tp' , filiere = '$filiere' WHERE id_groupe = $id_groupe");
            if($req){
                header("location: groupe.php");
            }else {
                $message = "groupe non modifié";
            }

        }else {
            $message = "Veuillez remplir tous les champs !";
        }
        }

        ?>

        <div class="form">
        <a href="groupe.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Modifier le groupe : <?=$row['id_groupe']?> </h2>
        <p class="erreur_message">
        <?php 
            if(isset($message)){
                echo $message ;
            }
        ?>
        </p>
        <form action="" method="POST">
        <label>groupe_cm</label>
        <input type="text" name="groupe_cm" value="<?=$row['groupe_cm']?>">
        <label>groupe_tp</label>
        <input type="text" name="groupe_tp" value="<?=$row['groupe_tp']?>">
        <label>filiere</label>
        <input type="text" name="filiere" value="<?=$row['filiere']?>">
        <input type="submit" value="Modifier" name="button">
        </form>
    </div>
    </div>

</body>
</html>