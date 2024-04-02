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
$prod=$loc=$tel="";
$prod=$_POST['prod'];
$loc=$_POST['loc'];
$msg=$_POST['msg'];


//3:Execution de la requête
if(isset($_POST['livrer'])){
    $req="INSERT INTO liv values('','$prod','$loc','$msg')";

    if($conn->query($req)===true){
        include('liv.html');
        }else{
            include('livraison.html');
        }
}
?>