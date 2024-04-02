<?php 
 //Nous allons démarrer la session avant toute chose
 session_start();

  if(isset($_POST['connecter'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire

    
    if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['tel'])) { 
        
        //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
      $nom = $_POST['nom'] ;
      $prenom = $_POST['prenom'] ;
      $tel = $_POST['tel'] ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $nom_serveur = "localhost:3307";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="livraison" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM client WHERE nom = '$nom' AND prenom ='$prenom'AND tel ='$tel' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:livraison.html") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['nom'] = $nom ;

        }else {//si non
            header("Location:connection.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
         

           }
    }         

     
  }
  
?>













<!DOCTYPE html>
<html>
    <head>
          <title>Connexion</title>
          <meta charset="UTF-8"/>
          <link rel="stylesheet" href="CSS/style3.css" type="text/css">
    </head>
    <body>
    <header>
        <div class="menu">
        
            <div id="logo">
            <img src="IMAGE/logo.jpeg" alt="150px" width="150px">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">HomePage</a></li>
                <li><a href="drinkkk.html">Drink</a></li>
                <li><a href="food.html">Spicy Food</a></li>
                <li><a href="sweet.html">Sweet Food</a></li>              
                <li><a href="breakfast.html">Breakfast</a></li>
                <li><a href="compte.html">Delivery</a></li>
            </ul>
        </nav>

        </div>
   </header>

        <div class="form">
            <form method="POST" action="connection.php">
                <h1>Se connecter :</h1>
                    <label>Nom :</label><input type="text" name="nom" placeholder="Ex:Ben ahmed"><br><!---nista3mlou name lel php -->
                    <label>Prénom :</label><input type="text" name="prenom" placeholder="Ex:Hajer"><br>
                    <label>Téléphone portable :</label><input type="tel" name="tel" placeholder="Ex:002161234567"><br>
                   


                <input type="submit" name="connecter" value="Se connecter">
            </form>
        </div>

















      
    <footer>
        <ul class="rx">
            <li><a href="https://www.instagram.com/le_bistrot17"><img src="IMAGE/instagram.png" title="Instagram" width="40" height="40"></a></li>
            <li><a href="https://www.facebook.com/bistrotcoffeeshop"><img src="IMAGE/facebook.png" title="Facebook" width="40" height="40"></a></li>
            <li><a href="www.tiktok.com/le_bistrot17"><img src="IMAGE/tiktok.png" title="TikTok" width="40" height="40"></a></li>   
            
        </ul>
        <p>Copyright © 2023 AB cafee . Tous droits réservés. </p>
    </footer>  
</div>

</body>
</html>