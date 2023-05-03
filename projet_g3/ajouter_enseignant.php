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
        $code = test_input($_POST['code']);
        $nom =  test_input($_POST['nom']);
        $prenom = test_input($_POST['prenom']); 
        $Date_naiss = test_input($_POST['Date_naiss']); 
        $lieu_naiss =  test_input($_POST['lieu_naiss']);
        $login =  test_input($_POST['login']);
        $pwd =  test_input($_POST['pwd']);
        $id_role =  test_input($_POST['id_role']);
        $active =  test_input($_POST['active']);
           if( isset($code) && isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login) && isset($pwd) && isset($id_role) && isset($active) ){
                $req = mysqli_query($conn , "INSERT INTO enseignant(`code`, `nom`, `prenom`, `Date_naiss`, `lieu_naiss`, `login`, `pwd`, `id_role`, `active`) VALUES('$code', '$nom', '$prenom','$Date_naiss','$lieu_naiss','$login','$pwd','$id_role','$active')");
                if($req){
                    header("location: enseignant.php");
                }else {
                    $message = "enseignant non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="enseignant.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un enseignant</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <label>code</label>
        <input type="number" name="code">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>prenom</label>
        <input type="text" name="prenom">
        <label>date_naiss</label>
        <input type="text" name="Date_naiss">
        <label>lieu_naiss</label>
        <input type="text" name="lieu_naiss">
        <label>login</label>
        <input type="text" name="login">
        <label>pwd</label>
        <input type="text" name="pwd">
        <label>id_role</label>
        <input type="text" name="id_role">
        <label>active</label>
        <input type="text" name="active">
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>