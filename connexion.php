<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>







    <section id="contentConnection">
        <img src="img/logo_2.png" alt="" id="logo">
        <h1 class="secondaryColor">Bienvenue sur PFR...</h1>
        <form action="connexion.php" methode="post">

            <div class="form">
                <label class ="dis"for="pseudo">Nom utilisateur : </label>
                <input type="text" name="pseudo" id="name" >
              </div>
              <div class="form">
                <label class="pass" for="password">Mot de passe : </label>
                <input type="password" name="password" id="passe" >
              </div>
              <div class="remember">
                <label class ="dis" for="rememberMe">se souvenir de moi :</label>
                <input class="checkbox" type="checkbox" name="rememberMe" id="">
              </div>
              <div class="formBouton">
               
              
                <input class="bg2 bouton" type="submit" value="connection">
                <div>
                    <input class="bg2 bouton" type="submit" value="Passez">
                </div>
            </div>

        </form>
        <div class="linkInscription">
        <p>première connexion?</p>
        <a href="inscription.php">inscrivez-vous ici!</a>
        </div>















    </section>










<?php




if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    var_dump($_POST['pseudo']);
    echo " 1ere étape checked";
    $hostName = "docker-lamp-mysql";
    $username = "root";
    $password = "p@ssw0rd";
    $dbname = 'PFR';
    $conn = null;

    $pseudo = $_POST['pseudo'];
    $userPassword = $_POST['password'];
    echo "préparation 2eme étape";
    try {
        $conn = new PDO("mysql:host=$hostName;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //requête qui trouve le mot de passe grâce a l'entrée utilisateur POST[name]
        $req = $conn->prepare("SELECT password_users FROM `users` WHERE `pseudo_users` = ?");
        $req->bindParam(1, $pseudo);
        $req->execute();
        
        $dbhash = null;
        //on va chercher le password hasher
        //si il n'y a qu'une seule ligne pour le résultat alors c'est bon on fetch la requete en ciblant password_users
        if ($req->rowCount() === 1) {
            $dbhash = $req->fetch()['password_users'];
        }
        //on verifie le password grâce a la fonction php password verify (1er arg : l'entrée utilisateur, 2eme arg : le hash de la base de donnée)
        var_dump(password_verify($userPassword, $dbhash));
        if (password_verify($userPassword, $dbhash)) {
            echo "Connecté";
            // on crée une session , plus d'explication à venir
            $_SESSION['authentified'] = true;
            // header('location: profil.php');
        }else{
            echo "erreur password invalide";
            return $userPassword;
        }
    }catch (PDOException $e) {
        echo "erreur : " . $e->getMessage();
    }
}





?>


<?php
    if (isset($_SESSION['authentified']) && $_SESSION['authentified'] === true) {
        ?>

        <h3>Vous êtes déjà connecté</h3>

        <p><a href="logout.php">Se déconnecter</a></p>
        <?php
    } else {
        echo "vous n'êtes pas connecté";
    }
        ?>






















    <script src="script/script.js"></script>
</body>
</html>