<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
    <?php
              include("connexion.php");
            function test_input($data){
                $data = htmlspecialchars($data);
                $data = trim($data);
                $data = htmlentities($data);
                $data = stripcslashes($data);

                return $data;
            }

       if(isset($_POST['button'])){
                $matricule = test_input($_POST['matricule']);
                $nom = test_input($_POST['nom']);
                $prenom = test_input($_POST['prenom']); 
                $semestre = test_input($_POST['semestre']);
                $annee = test_input($_POST['annee']);
                $Date_naiss = test_input($_POST['Date_naiss']); 
                $lieu_naiss =  test_input($_POST['lieu_naiss']);
                $login =  test_input($_POST['login']);
                //extract($_POST);
                if( isset($matricule) && isset($nom) && isset($prenom) && isset($lieu_naiss)  && isset($Date_naiss)){
                $req = "INSERT INTO etudiant (`matricule`, `nom`, `prenom`, `lieu_naiss`, `Date_naiss`) VALUES('$matricule','$nom','$prenom','$lieu_naiss','$Date_naiss')";
                // && isset($semestre)  && isset($annee)  && isset($login)
                //, `semestre`, `annee`, `login`,`id_role`
                //, '$semestre', '$annee','$login',2

                $req = mysqli_query($conn , $req);
                if($req){
                    header("location:etudiant.php");
                }else {
                    $message = "etudiant non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="etudiant.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un etudiant</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        
        <label>Matricule</label>
        <input type="number" autocomplete="off" name="matricule">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss">
        <label>Date de naissance</label>
        <input type="text" name="Date_naiss">
        <label>Semestre</label>
        <input type="text" name="semestre">
        <label>Année</label>
        <input type="text" name="annee">
        <label>E-mail</label>
        <input type="email" name="login">
        <input type="submit" value="Ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>