<?php
require_once('connexion.php');
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Login</title>
        <link rel="stylesheet" href="SignUP.css" type="text/css">
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAJmx4ACZ+eAAmbTgAJk+KgAdAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIAF144ACZ+eAAmf/gAJn/4ACZ++AAmcG2AHwzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqAB0M4ACZseAAmf3gAJn/4ACZ/+AAmf/gAJn/4ACZ/dIAj35qAEgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfgBWM+AAmd7gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZlygAGwEAAAAAAAAAAAAAAAAAAAAAAAAAAOAAmYDgAJn+4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf3CAIUpAAAAAAAAAAAAAAAAAAAAAAAAAADgAJnn4ACZ/+AAmf/gAJn04ACZoNoAlVvgAJnR4ACZ/+AAmf/gAJn/4ACZYgAAAAAAAAAAAAAAAAAAAADIAIlh4ACZ/+AAmf/gAJn/4ACZwAAAAAAIAAUD4ACZfOAAmf/gAJn/4ACZ/eAAmVEAAAAAAAAAAAAAAABOADUD4ACZyeAAmf/gAJn/4ACZ/+AAmcm2AHxQvgCCeuAAmdngAJn/4ACZ/+AAmcdSADgdAAAAAAAAAAAAAAAAeABSOuAAmezgAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ8eAAmbJOADUkAAAAAAAAAAAAAAAAAAAAAOAAmWHgAJn14ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmfHgAJmRfgBWEAAAAAAAAAAAAAAAACgAGwvgAJmj4ACZ/uAAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmdHgAJkXAAAAAAAAAAAoABsk4ACZxeAAmf/gAJn/4ACZ/+AAmciaAGlymgBpX+AAmbjgAJn/4ACZ/+AAmf/gAJn/4ACZoAAAAAAAAAAAwgCFJuAAmezgAJn/4ACZ/+AAmfNOADUkAAAAAAAAAADgAJlK4ACZ/+AAmf/gAJn/4ACZ/+AAmfUAAAAAAAAAAOAAmVLgAJn/4ACZ/+AAmf/gAJn/4ACZxeAAmangAJnS4ACZ/+AAmf/gAJn/4ACZ/+AAmf7gAJnrAAAAAAAAAADgAJlb4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmebgAJmapgBxNAAAAAAAAAAAUgA4EeAAmY/gAJnY4ACZ8eAAmf/gAJn/4ACZ9eAAmdrgAJm94ACZjeAAmU0qAB0pKgAdGQAAAAAAAAAA/H8AAPwfAAD4DwAA+AMAAPADAADwQwAA8OMAAODDAADgBwAA4AcAAMADAADBgQAAw8EAAMABAADAAwAAwB8AAA==" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <h1>Bienvenu dans gestion des stocks &amp; ventes <em>XCompany</em></h1>
        <div class="signin">
            <img src="images/user-icon-png-transparent-17.jpg">
            <form action="" method="post">
                <h2>S'identifier</h2>
                <input type="text" class="in" name="IDUser" placeholder="Votre ID"/>
                <br> <br>
                <input type="password" class="in" name="password" placeholder="Votre Mot de Passe"/>
                <br> <br>
                <input type="submit" name="btlogin" class="btn" value="connexion"/>
                <br>
                <?php
                   if(isset($_POST['btlogin']))
               {
                 $req="select * from login where IDUser='".$_POST['IDUser']."' and password='".$_POST['password']."'";
                if($resultat=mysqli_query($liaison,$req))/* mysqli_query est  une fonction qui fait l'execution de req*/
                {
                 $ligne=mysqli_fetch_assoc($resultat);
                 if($ligne!=0)
                {
               session_start();
               $_SESSION['IDUser']=$_POST['IDUser'];
                if($ligne['IDUser']=="Admin")
                {header("location:SessionAdmin/PageAdmin.php");}/*la fonction header permet de faire la redirection vers les pages*/
                else if($ligne['IDUser']=="AT1")
                {header("location:GestionAchat/DashboardA.php");}
                else if($ligne['IDUser']=="VT1")
                {header("location:GestionVente/Produits.php");}
                }
                else
                {
                echo "<font color='brown' size='5px'>ID User ou Mot de passe incorrecte</font>";
                }
               }
              }
                ?>
            </form>
        </div>
    </body>    
</html>

            