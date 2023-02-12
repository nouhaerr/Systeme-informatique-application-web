<?php
session_start();
require_once('..\connexion.php'); 
include('SidebarA.php');
?>

     
            <div class="home">
            <form name="formAdd" action="" method="post" enctype="multipart/form-data">
                <h2 align="center"> Modifier Produit</h2>

                <label><b>Id produit:</b></label>
                  <input type="text" name="IdProduit" class="zonetext"   value="<?php echo $_GET['modP'] ?>" readonly>
    			      <label><b>Catégorie:</b></label>
    			        <input type="text" name="Catégorie" class="zonetext" placeholder="Entrer la catégorie du produit" required></br>
    			      <label><b>Désignation:</b></label>
    			        <input type="text" name="Désignation" class="zonetext" placeholder="Entrer la désignation du produit" required></br>
                <label><b>Photo:</b></label>
    			        <input type="file" name="Photo" class="zonetext" placeholder="Choisir une image" required>  </br>
                <label><b>Prix:</b></label>
    			        <input type="text" name="Prix" class="zonetext" placeholder="Entrer le prix" required>
                <label><b>Quantité:</b></label>
    			        <input type="text" name="Quantité" class="zonetext" placeholder="Entrer la quantité" required>
                <label><b>Id Fournisseur:</b></label>
    			        <input type="text" name="IdFour" class="zonetext" placeholder="Id Four" required>

    			   <input type="submit" name="btmod" value="Modifier" class="submit">
                   
                   
                <?php
                if(isset($_POST['btmod']))
                {
                $IdP=$_POST['IdProduit'];
                $Ca=$_POST['Catégorie'];
                $des=$_POST['Désignation'];
                $modifier=$_GET['modP']; 
                $image=$_FILES['Photo']['tmp_name'];
                $traget="../images/".$_FILES['Photo']['name'];
                move_uploaded_file($image,$traget);
                $Pr=$_POST['Prix'];
                $Qt=$_POST['Quantité'];
                $IdF=$_POST['IdFour'];
                $reqUp="UPDATE produits  SET Catégorie='$Ca', Désignation='$des',Photo='$traget', Prix='$Pr',Quantité='$Qt',IdFour='$IdF' where IdProduit='$modifier'";
                $resultat=mysqli_query($liaison,$reqUp);
                     if($resultat)
                         {
                       echo"les données sont bien modifiées";
                  }
                else {
                      echo "Echec de modification! Veuillez Ressayer";
                    }
                header('refresh:1 ;url=GestionAchat/Produits.php');
                }
                ?>
                <p> <a href="Produits.php" class="submit">Retour</a></p>
        </form>
              </div>
    </body>
</html>