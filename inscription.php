




















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
    <section id="inscription">
        <div class="inscriptionP1">
            <img src="img/logo_2.png" alt=""id="logo">
            <h1 class="secondaryColor">inscription</h1>
            
        </div>
        <form class="formInscription" method="post" action="connexion.php">

            <div class="formDisplay">
                <label for="name">Nom : </label>
                <input type="text" name="name" id="name" >
            </div>
            <div class="formDisplay">
                <label for="name">Prénom : </label>
                <input type="text" name="first_name" id="name" >
            </div >
            <div class="formDisplay">
                <label for="name">Nom utilisateur : </label>
                <input type="text" name="pseudo" id="name" >
            </div>
            <div class="formDisplay">
                <label for="email">Enter your email: </label>
                <input type="email" name="email" id="email" >
            </div>
            <div class="formDisplay">
                <label  for="password">Mot de passe : </label>
                <input type="password" name="password" id="passe" >
              </div>
              <div class="formDisplay">
                <label  for="password">Confirmer mot de passe : </label>
                <input type="password" name="confirm_password" id="passe" >
              </div> 
              <div class="displayVide">
                <div class="vide"></div>

            <input class="bg2 bouton" id="envoyer" type="submit" value="envoyer">
                <!-- <button class="bg2 bouton " type="button"><a class="tertiaryColor"href="Profil.html">envoyer</a></button> -->
              </div>
              




        </form>

    </section>
<?php

$hostName = "docker-lamp-mysql";

$userName = "root";
$password = "p@ssw0rd";
$dbName = "PFR";

$conn = null;


try{
    if(isset($_POST["name"])&&isset($_POST["first_name"])&&isset($_POST["pseudo"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["confirm_password"])){
        $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connexion réussie";
    
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $pass_users = $_POST["password"];
        $confirm_pass = $_POST["confirm_password"];

        $sql = "INSERT INTO users(first_name_users,name_users,pseudo_users,email_users,password_users)VALUES(?,?,?,?,?)";
        $req = $conn->prepare($sql);
        $req->bindParam(1,$first_name);
        $req->bindParam(2,$name);
        $req->bindParam(3,$pseudo);
        $req->bindParam(4,$email);
        if($pass_users === $confirm_pass){
            $pass_users = password_hash($pass_users, PASSWORD_BCRYPT);
            $req->bindParam(5,$pass_users);
        }else{
            echo "les mots de passe ne correspondent pas !";
            return $pass;
        }
        $req->execute();
        
        
    }
    
    

}
catch(PDOException $e){
    echo "erreur : ".$e->getMessage();
}




?>
    <script src="script/script.js"></script>
</body>
</html>

