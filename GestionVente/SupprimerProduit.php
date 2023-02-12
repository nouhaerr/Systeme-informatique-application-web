<?php 

    require_once('..\connexion.php');    

    if(isset($_GET['supP']))
    	{
    	$sup=$_GET['supP'];
        $reqDelete="DELETE FROM produits WHERE IdProduit='$sup'";
        $resultat=mysqli_query($liaison,$reqDelete);
        header('location:Produits.php');
    }
    else{
            echo "<script> alert('Echec de suppression !')</script>";
        header('location:Produits.php');
    }
?>