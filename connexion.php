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
                <label class ="dis"for="name">Nom utilisateur : </label>
                <input type="text" name="name" id="name" >
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
        <a href="inscription.html">inscrivez-vous ici!</a>
        </div>















    </section>










<?php

$hostName = "docker-lamp-mysql";

$userName = "root";
$password = "p@ssw0rd";
$dbName = "PFR";

$conn = null;


try{

    $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion réussie";
    $name = $_POST["name"];
    

}












?>











    <script src="script/script.js"></script>
</body>
</html>