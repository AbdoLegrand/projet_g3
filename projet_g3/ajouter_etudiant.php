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
              include_once "connexion.php";
            function test_input($data){
                $data = htmlspecialchars($data);
                $data = trim($data);
                $data = htmlentities($data);
                $data = stripcslashes($data);

                return $data;
            }

       if(isset($_POST['button'])){
                $matricule = test_input($_POST['matricule']);
                $semestre = test_input($_POST['semestre']);
                $annee = test_input($_POST['annee']);
                $nom =  test_input($_POST['nom']);
                $prenom = test_input($_POST['prenom']); 
                $Date_naiss = test_input($_POST['date_naiss']); 
                $lieu_naiss =  test_input($_POST['lieu_naiss']);
                $login =  test_input($_POST['login']);
                $pwd =  test_input($_POST['pwd']);
                $id_role =  test_input($_POST['id_role']);
                $active =  test_input($_POST['active']);
           if( isset($matricule) && isset($semestre)  && isset($annee) && isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login) && isset($pwd) && isset($id_role) && isset($active) ){
                $req = "INSERT INTO etudiant( `matricule`, `nom`, `prenom`, `lieu_naiss`, `Date_naiss`, `semestre`, `annee`, `login`, `pwd`, `id_role`, `active`) VALUES('$matricule', '$nom','$prenom', '$lieu_naiss','$Date_naiss', '$semestre', '$annee','$login','$pwd','$id_role','$active')";
                $req = mysqli_query($conn , $req);
                if($req){
                    header("location: etudiant.php.php");
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
        <label>Date de naissance</label>
        <input type="text" name="date_naiss">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss">
        <label>Semestre</label>
        <input type="text" name="semestre">
        <label>Année</label>
        <input type="text" name="annee">
        <label>Login</label>
        <input type="text" name="login">
        <label>Mot de passe</label>
        <input type="password" name="pwd">
        <label>Rôle</label>
        <input type="text" name="id_role">
        <label>Active</label>
        <input type="text" name="active">
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>