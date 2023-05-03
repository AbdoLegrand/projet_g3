<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="style.css" />
    <title>dropdown Menu</title>
  </head>
  <body>
    <div class="menu-bar">
      <ul>
        <li><a href="#">administration <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-menu">
                <ul>
                  <li><a href="etudiant.php">etudiants</a></li>
                  <li><a href="enseignant.php">enseignants</a></li>
                  <li><a href="groupe.php">groupes </a></li>
                </ul>
              </div>
        </li>
        <li><a href="#">Soummission</a></li>
      </ul>
      <div class="logout" ><a href="supprimer_session.php">Se déconnecte</a></div>
    </div>

    <div class="hero">
      &nbsp;
    </div>
  </body>
</html>
