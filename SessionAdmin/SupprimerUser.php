<?php
require_once('..\connexion.php');

    if(isset($_GET['supUser']))
    	{
    		$sup=$_GET['supUser'];
            $reqDelete="DELETE FROM login WHERE IDUser='$sup'";
            $resultat=mysqli_query($liaison,$reqDelete);
			header('location:Produits.php');
			}
		else{
			echo "<script> alert('Echec de suppression !')</script>";
			header('location:Produits.php');
			}
?>
				