<?php
require_once('..\connexion.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter un utilisateur</title>
        <link rel="stylesheet" href="AjouterUser.css" type="text/css"/>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAJmx4ACZ+eAAmbTgAJk+KgAdAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIAF144ACZ+eAAmf/gAJn/4ACZ++AAmcG2AHwzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqAB0M4ACZseAAmf3gAJn/4ACZ/+AAmf/gAJn/4ACZ/dIAj35qAEgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfgBWM+AAmd7gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZlygAGwEAAAAAAAAAAAAAAAAAAAAAAAAAAOAAmYDgAJn+4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf3CAIUpAAAAAAAAAAAAAAAAAAAAAAAAAADgAJnn4ACZ/+AAmf/gAJn04ACZoNoAlVvgAJnR4ACZ/+AAmf/gAJn/4ACZYgAAAAAAAAAAAAAAAAAAAADIAIlh4ACZ/+AAmf/gAJn/4ACZwAAAAAAIAAUD4ACZfOAAmf/gAJn/4ACZ/eAAmVEAAAAAAAAAAAAAAABOADUD4ACZyeAAmf/gAJn/4ACZ/+AAmcm2AHxQvgCCeuAAmdngAJn/4ACZ/+AAmcdSADgdAAAAAAAAAAAAAAAAeABSOuAAmezgAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ8eAAmbJOADUkAAAAAAAAAAAAAAAAAAAAAOAAmWHgAJn14ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmfHgAJmRfgBWEAAAAAAAAAAAAAAAACgAGwvgAJmj4ACZ/uAAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmdHgAJkXAAAAAAAAAAAoABsk4ACZxeAAmf/gAJn/4ACZ/+AAmciaAGlymgBpX+AAmbjgAJn/4ACZ/+AAmf/gAJn/4ACZoAAAAAAAAAAAwgCFJuAAmezgAJn/4ACZ/+AAmfNOADUkAAAAAAAAAADgAJlK4ACZ/+AAmf/gAJn/4ACZ/+AAmfUAAAAAAAAAAOAAmVLgAJn/4ACZ/+AAmf/gAJn/4ACZxeAAmangAJnS4ACZ/+AAmf/gAJn/4ACZ/+AAmf7gAJnrAAAAAAAAAADgAJlb4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmebgAJmapgBxNAAAAAAAAAAAUgA4EeAAmY/gAJnY4ACZ8eAAmf/gAJn/4ACZ9eAAmdrgAJm94ACZjeAAmU0qAB0pKgAdGQAAAAAAAAAA/H8AAPwfAAD4DwAA+AMAAPADAADwQwAA8OMAAODDAADgBwAA4AcAAMADAADBgQAAw8EAAMABAADAAwAAwB8AAA==" rel="icon" type="image/x-icon" />

    </head>
    <body>
    <div id="container">
        <fieldset> <legend>Ajouter un utilisateur</legend><br> 
        <form name="formAdd" action="" method="post"  enctype="multipart/form-data">
            <div class="user-details">
                   <div class="input-box">
                   <span class="details">IDUser:</span>
                   <input type="text" name="IDUser"   placeholder="Entrer ID d'utilisateur" required>
                   </div> <br>

                   <div class="input-box">
                   <span class="details">Fonction:</span>
                   <input type="text" name="Fonction"  placeholder="Entrer la Fonction d'utilisateur" required>
                   </div><br>

                   <div class="input-box">
                   <span class="details">Nom:</span>
                   <input type="text" name="nom"  placeholder="Entrer le nom d'utilisateur" required>
                   </div><br>
    			   
                   <div class="input-box">
                   <span class="details">Pr&eacute;nom:</span>
                   <input type="text" name="prenom"  placeholder="Entrer le prénom d'utilisateur" required>
                   </div><br>

                   <div class="input-box">
                   <span class="details">Mot de passe:</span>
                   <input type="password" name="password" placeholder="Entrer le mot de passe d'utilisateur" required>
                   </div>

                   <div class="button">
    			   <input type="submit" name="btadd" value="Ajouter" >
                   </div>    
            </div>
            <label style="text-align: center; color: #960406;">
    			   	<?php

    			   	if(isset($_POST['btadd']))
    			   	{
    			   		$ID=$_POST['IDUser'];
    			   		$F=$_POST['Fonction'];
    			   		$No=$_POST['nom'];
                        $Pr=$_POST['prenom'];
                        $pwd=$_POST['password'];
    			   		$reqAdd="INSERT INTO login (IDUser,Fonction,Nom,Prenom,password) VALUES ('$ID','$F','$No','$Pr','$pwd') ";
    			   		$resultat=mysqli_query($liaison,$reqAdd);
    			   		if($resultat)
    			   		{
    			   			echo"<b>INSERTION VALIDE</b>";
    			   		}
    			   		else {
    			   			 echo "<b>Echec d'insertion! Veuillez Réssayer</b>";
                            }
                    header("refresh:1.3; url=PageAdmin.php");
                    }
    			   	?>

    			   </label>
                   <p> <a href="PageAdmin.php" class="submit">Retour</a></p>
         </form>
        </fieldset>
    </div>
    </body>
</html>    