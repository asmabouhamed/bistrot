<?php
   session_start() ;
//1:connexion à la base de données
$servername="localhost:3307";
$username="root";
$password="";
$DBname="livraison";
//création de la connexion
$conn=new mysqli($servername,$username,$password,$DBname);
//test de connexion
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
//2:Déclaration et récupèration les valeurs entrèes par l'utilisateur
$nom=$prenom=$tel=$email=$password="";
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$password=$_POST['password'];

//3:Execution de la requête
if(isset($_POST['inscrire'])){
    $req="INSERT INTO client values('','$nom','$prenom','$tel','$email','$password')";

    if($conn->query($req)===true){
        include('livraison.html');
        }else{
            include('inscription.html');
        }
}
?>