<?php
require_once('../connexion.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Modifier utilisateur</title>
        <link rel="stylesheet" href="AjouterUser.css" type="text/css"/>
		<link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAJmx4ACZ+eAAmbTgAJk+KgAdAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIAF144ACZ+eAAmf/gAJn/4ACZ++AAmcG2AHwzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqAB0M4ACZseAAmf3gAJn/4ACZ/+AAmf/gAJn/4ACZ/dIAj35qAEgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfgBWM+AAmd7gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZlygAGwEAAAAAAAAAAAAAAAAAAAAAAAAAAOAAmYDgAJn+4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf3CAIUpAAAAAAAAAAAAAAAAAAAAAAAAAADgAJnn4ACZ/+AAmf/gAJn04ACZoNoAlVvgAJnR4ACZ/+AAmf/gAJn/4ACZYgAAAAAAAAAAAAAAAAAAAADIAIlh4ACZ/+AAmf/gAJn/4ACZwAAAAAAIAAUD4ACZfOAAmf/gAJn/4ACZ/eAAmVEAAAAAAAAAAAAAAABOADUD4ACZyeAAmf/gAJn/4ACZ/+AAmcm2AHxQvgCCeuAAmdngAJn/4ACZ/+AAmcdSADgdAAAAAAAAAAAAAAAAeABSOuAAmezgAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ8eAAmbJOADUkAAAAAAAAAAAAAAAAAAAAAOAAmWHgAJn14ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmfHgAJmRfgBWEAAAAAAAAAAAAAAAACgAGwvgAJmj4ACZ/uAAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmdHgAJkXAAAAAAAAAAAoABsk4ACZxeAAmf/gAJn/4ACZ/+AAmciaAGlymgBpX+AAmbjgAJn/4ACZ/+AAmf/gAJn/4ACZoAAAAAAAAAAAwgCFJuAAmezgAJn/4ACZ/+AAmfNOADUkAAAAAAAAAADgAJlK4ACZ/+AAmf/gAJn/4ACZ/+AAmfUAAAAAAAAAAOAAmVLgAJn/4ACZ/+AAmf/gAJn/4ACZxeAAmangAJnS4ACZ/+AAmf/gAJn/4ACZ/+AAmf7gAJnrAAAAAAAAAADgAJlb4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmebgAJmapgBxNAAAAAAAAAAAUgA4EeAAmY/gAJnY4ACZ8eAAmf/gAJn/4ACZ9eAAmdrgAJm94ACZjeAAmU0qAB0pKgAdGQAAAAAAAAAA/H8AAPwfAAD4DwAA+AMAAPADAADwQwAA8OMAAODDAADgBwAA4AcAAMADAADBgQAAw8EAAMABAADAAwAAwB8AAA==" rel="icon" type="image/x-icon" />

    </head>
    <body>
        <div id="container">
			<fieldset><legend>Modifier un utilisateur</legend>
            <form name="formMod" action="" method="post" class="formulaire" enctype="multipart/form-data">
				<div class="user-details">
					<div class="input-box">
						<label><b>IDUser:</b></label>
						<input type="text" name="IDUser" class="zonetext"   value="<?php echo $_GET['modUser'] ?>" readonly>
			        </div><br>
			        <div class="input-box"> 
				        <label><b>Fonction:</b></label>
				        <input type="text" name="Fonction" class="zonetext" placeholder="Entrer la Fonction de l'utilisateur" required></br>
                    </div><br>
    		        <div class="input-box">
    			        <label><b>Nom:</b></label>
    			        <input type="text" name="nom" class="zonetext" placeholder="Entrer un le nom de l'utilisateur" required><br>
			        </div><br>
			        <div class="input-box">
				        <label><b>Pr&eacute;nom:</b></label>
    			        <input type="text" name="prenom" class="zonetext" placeholder="Entrer le prenom" required><br>
			        </div><br>
			        <div class="input-box">
				        <label><b>Mot de passe:</b></label>
    			        <input type="password" name="password" class="zonetext" placeholder="mot de passe" required>
			        </div>
			        <div class="button">
    			        <input type="submit" name="btadd" value="Modifier" class="submit">
				    </div>
		        </div>
    			<label style="text-align: center; color: #960406;">
    			   	<?php

    			   	if(isset($_POST['btadd']))
    			   	{
                        $ID=htmlspecialchars($_POST['IDUser']);
                        $F=htmlspecialchars($_POST['Fonction']);
                        $No=htmlspecialchars($_POST['nom']);
                        $Pr=htmlspecialchars($_POST['prenom']);
                        $pwd=htmlspecialchars($_POST['password']);
                        $modifier=htmlspecialchars($_GET['modUser']);
    			   		$reqUp="UPDATE login  SET Fonction='$F',nom='$No',prenom='$Pr',password='$pwd' where IDUser='$modifier'";
    			   		$resultat=mysqli_query($liaison,$reqUp);
    			   		if($resultat)
    			   		{
    			   			echo"Les données sont bien modifiées";
    			   		}
    			   		else {
    			   			 echo "Echec de modification! Veuillez Ressayer";
							}
					header("refresh:1.5; url=PageAdmin.php");
				    }
    			   	?>
				</label>
				<p> <a href="PageAdmin.php" class="submit">Retour</a></p>
			</form>
			</fieldset>
        </div>
    </body>
</html>