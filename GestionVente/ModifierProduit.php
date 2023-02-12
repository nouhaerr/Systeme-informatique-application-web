<?php
        session_start(); 
        require_once('..\connexion.php');
      include('Menu.php');
        
?>
    <link rel="stylesheet" href="Styles/MAJProd.css" type="text/css">
           
           <div class="MAJ">Modifer les données du produit </div>

            <form name="formAdd" id="formAdd" action="" method="post" enctype="multipart/form-data">
            
                <label for="IdProduit"><b>Id produit:</b></label>
                  <input type="text" name="IdProduit" class="zonetext" style="width:17%"  value="<?php echo $_GET['modP'] ?>" readonly>
      

    			      <label for="Catégorie" style="margin-left:70px"><b>Catégorie:</b></label>
                <input type="text" name="Catégorie" class="zonetext" placeholder="Entrer la catégorie" required>
                <br> 			      
            
            <label><b>Désignation:</b></label>
    			        <input type="text" name="Désignation" class="zonetext" placeholder="Entrer la désignation du produit" required>

            <label for="Prix" style="margin-left:45px"><b>Prix:</b></label>
    			        <input type="text" name="Prix" class="zonetext" placeholder="Entrer le prix" style="margin-left:10px;width:17%" required>
            </br>
            <label for="Quantité"><b>Quantité:</b></label>
    			        <input type="number" name="Quantité" class="zonetext" placeholder="Entrer la quantité" style="width:20%" required>

                <label for="IdFour" style="margin-left:45px"><b>Id Fournisseur:</b></label>
                <input type="text" name="IdFour" class="zonetext" placeholder="Entrer IdFour" style="width:20%" required>
                <br><br>
                <label style="width:30%" class="pic"><b>Choisir une image</b>
    			        <input type="file" name="Photo" class="zonetext" required>
                  <i class="fa-solid fa-camera-retro ico"></i> 
                </label>
                <br>
                  

    			   <input type="submit" name="btmod" value="Modifier" class="submit"><br>
                   
             <label style="text-align:center;color:black;font-weight:bold;">    
                <?php
                if(isset($_POST['btmod']))
                {
                $IdP=$_POST['IdProduit'];
                $Ca=$_POST['Catégorie'];
                $des=$_POST['Désignation'];
                $modifier=$_GET['modP'];
                $Pr=$_POST['Prix'];
                $Qt=$_POST['Quantité'];
                $IdF=$_POST['IdFour'];
                $image=$_FILES['Photo']['tmp_name'];
                $traget="../images/".$_FILES['Photo']['name'];
                move_uploaded_file($image,$traget);
                
                $reqUp="UPDATE produits  SET Catégorie='$Ca' ,Désignation='$des' ,Photo='$traget', Prix='$Pr', Quantité='$Qt',IdFour='$IdF' where IdProduit='$modifier' ";
                $resultat=mysqli_query($liaison,$reqUp);
                     if($resultat)
                         {
                       echo"Les données sont bien modifiées";
                  }
                else {
                      echo "Echec de modification! Veuillez Ressayer";
                    }
                
                }
                
                ?>
             </label><br>
             <p> <a style="color:white;" href="Produits.php" class="back"><i class="fa-solid fa-arrow-left icc"></i> Retour</a></p>

        </form>
              </div>
    </section>
    </body>

    </html>