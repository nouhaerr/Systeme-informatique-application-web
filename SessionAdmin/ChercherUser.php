<?php
require_once('..\connexion.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Recherche des utilisateurs</title>
		<link rel="stylesheet" href="Admin.css" type="text/css"/>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAJmx4ACZ+eAAmbTgAJk+KgAdAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIAF144ACZ+eAAmf/gAJn/4ACZ++AAmcG2AHwzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAqAB0M4ACZseAAmf3gAJn/4ACZ/+AAmf/gAJn/4ACZ/dIAj35qAEgCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfgBWM+AAmd7gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZlygAGwEAAAAAAAAAAAAAAAAAAAAAAAAAAOAAmYDgAJn+4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf3CAIUpAAAAAAAAAAAAAAAAAAAAAAAAAADgAJnn4ACZ/+AAmf/gAJn04ACZoNoAlVvgAJnR4ACZ/+AAmf/gAJn/4ACZYgAAAAAAAAAAAAAAAAAAAADIAIlh4ACZ/+AAmf/gAJn/4ACZwAAAAAAIAAUD4ACZfOAAmf/gAJn/4ACZ/eAAmVEAAAAAAAAAAAAAAABOADUD4ACZyeAAmf/gAJn/4ACZ/+AAmcm2AHxQvgCCeuAAmdngAJn/4ACZ/+AAmcdSADgdAAAAAAAAAAAAAAAAeABSOuAAmezgAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ8eAAmbJOADUkAAAAAAAAAAAAAAAAAAAAAOAAmWHgAJn14ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmfHgAJmRfgBWEAAAAAAAAAAAAAAAACgAGwvgAJmj4ACZ/uAAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmdHgAJkXAAAAAAAAAAAoABsk4ACZxeAAmf/gAJn/4ACZ/+AAmciaAGlymgBpX+AAmbjgAJn/4ACZ/+AAmf/gAJn/4ACZoAAAAAAAAAAAwgCFJuAAmezgAJn/4ACZ/+AAmfNOADUkAAAAAAAAAADgAJlK4ACZ/+AAmf/gAJn/4ACZ/+AAmfUAAAAAAAAAAOAAmVLgAJn/4ACZ/+AAmf/gAJn/4ACZxeAAmangAJnS4ACZ/+AAmf/gAJn/4ACZ/+AAmf7gAJnrAAAAAAAAAADgAJlb4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmf/gAJn/4ACZ/+AAmebgAJmapgBxNAAAAAAAAAAAUgA4EeAAmY/gAJnY4ACZ8eAAmf/gAJn/4ACZ9eAAmdrgAJm94ACZjeAAmU0qAB0pKgAdGQAAAAAAAAAA/H8AAPwfAAD4DwAA+AMAAPADAADwQwAA8OMAAODDAADgBwAA4AcAAMADAADBgQAAw8EAAMABAADAAwAAwB8AAA==" rel="icon" type="image/x-icon" />
    </head>
    <body>
		<h1>Chercher utilisateurs</h1>
        <section class="container">
			<form  action="" method="POST" id="SearchBox">
				<input type="search" name="s" placeholder="Recherche par Id.." id="searchInput">
				<i class="fas fa-search"></i>			
			</form>
        </section>
		<?php
		if(isset($_POST['s']))
		        {$ID=$_POST['s'];
		        $reqSelect="select * from login where IDUser like '%$ID%'";
		        }
		        else {
		        $reqSelect="select * from login";
		        }
		    	    $resultat=mysqli_query($liaison,$reqSelect);
				?>
		<section id="affich">
			<table>
				<caption><b>Liste des utilisateurs</b></caption>
                <tr>
                    <th>IDUser</th>
                    <th>Fonction</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Password</th>
					<th colspan="2">Action</th>
                </tr>
				<?php 
                if(isset($_POST['s']) and !empty($resultat))
			        while($ligne=mysqli_fetch_assoc($resultat))
			        {
					?>
                    <tr>
                        <td><?php echo $ligne['IDUser'];?></td>
                        <td><?php echo $ligne['Fonction'];?></td>
                        <td> <?php echo $ligne['Nom'];?></td>
                        <td> <?php echo $ligne['Prenom'];?></td>
                        <td> <?php echo $ligne['password'];?></td>
                        <td> <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" href="SupprimerUser.php?supUser=<?php echo $ligne['IDUser'];?>"> <img src="..\images\Deletee.png" width="30px" height="30px"></a></td>
			            <td> <a href="ModifierUser.php?modUser=<?php echo $ligne['IDUser'];?>"> <img src="..\images/modifierr.png" width="30px" height="30px"></a></td>
	                </tr> <?php 
					}
			    ?>
		    </table>
			<p><button  class="sbt">
               <a href="PageAdmin.php">Retour</a>
			   </button>
			</p>
	    </section>
		<script src="https://kit.fontawesome.com/3d41bb7ec2.js" crossorigin="anonymous"></script>
    </body>
</html>