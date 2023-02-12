<?php
require_once('..\connexion.php');
include('SidebarA.php');
?>
 <link rel="stylesheet" href="Commander.css">
 <div style="width:100%;display:block;text-align:center;">
			</div>
			
			<div class="div_saut_ligne" style="height:30px;">
			</div>						
			
			<div style="float:left;width:10%;height:40px;"></div>
			<div style="float:left;width:80%;height:auto;text-align:center;">
			<div class="titre_h1">
			<h1>Passer commandes</h1>
			</div>
			</div>
			<div style="float:left;width:10%;height:40px;"></div>
			
			<div class="div_saut_ligne" style="height:30px;">
			</div>
			
			<div style="float:left;width:10%;height:250px;"></div>
			<div style="float:left;width:80%;height:250px;text-align:center;">
			<form id="formulaire" name="formulaire" method="post" action="rep_stock.php">
				<div class="titre_h1" style="height:250px;">
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						Produit à commander :<br />
						<select id="ref_produit" name="ref_produit" onchange="document.getElementById('tampon').value='recup';recolter();">
							<option value="0">Choisir Id Produit</option>
							<?php 
								$requete = "SELECT IdProduit FROM produits ORDER BY IdProduit;";
								$retours = mysqli_query($liaison, $requete);
								while($retour = mysqli_fetch_array($retours))
								{
									echo "<option value='".$retour["IdProduit"]."'>".$retour["IdProduit"]."</option>";
								}					
							?>
						</select>
						<input type="text" id="tampon" name="tampon" style="visibility:hidden;" />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						Désignation du produit :<br />
						<input type="text" id="des_produit" name="des_produit" style="width:90%;" disabled />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					
					
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						Quantité à commander:<br />
						<input type="text" id="qte_produit" name="qte_produit" />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						Quantité avt cmd :<br />
						<input type="text" id="qte_produit_avt" name="qte_produit_avt" disabled />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						Quantité aps cmd :<br />
						<input type="text" id="qte_produit_aps" name="qte_produit_aps"  />
					</div>					
					<div style="width:10%;height:75px;float:left;"></div>					

			    <div class="div_saut_ligne" style="height:30px;">
			    </div>					
					
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:left;">
						<input type="button" id="valider" name="valider" value="Valider la commande" onclick="document.getElementById('tampon').value='maj';recolter();" />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div id="msg_reponse" style="width:35%;height:75px;float:left;font-size:24px;font-weight:bold;text-align:left;color:black;">
						<?php 
							echo "Réponse serveur";
						?>
					</div>
					<div style="width:10%;height:75px;float:left;"></div>					
					
				</div>
			</form>
			</div>
			<div style="float:left;width:10%;height:250px;"></div>			
			
			<div class="div_saut_ligne" style="height:50px;">
			</div>				




            <form method="POST" class="home">
                <fieldset class="CMD">
                    <legend>COMMANDER</legend>
                    <label for="IdCommande">Id Produit:</label>
                    <input type="text" name="IdCommande" placeholder="Id du produit">
                    <br><br>
                    <label for="Catégorie">Catégorie:</label>
                    <input type="text" name="Catégorie" placeholder="Sa catégorie">
                    <br><br>
                    <label for="Quantité">Quantité:</label>
                    <input type="text" name="Quantité" placeholder="Quantité">
                    <br><br>
                    <label for="DateCommande">Date de commande:</label>
                    <input type="date" name="DateCommande" placeholder="date de commande">
                    <br><br>
                    <input type="submit" name="btCMD" value="Commander">

                    <?php
                    if(isset($_POST['btCMD']))
                    {
                        $IdC=$_POST['IdCommande'];
                        $Ca=$_POST['Catégorie'];
                        $Qu=$_POST['Quantité'];
                        $IdF=$_POST['IdFour'];
                        $reqAdd="INSERT INTO commandes (IdCommande,IdProduit,Quantité) VALUES ('$IdC','$Ca','$Qu') ";
                        $resultat=mysqli_query($liaison,$reqAdd);
                        if($resultat)
                        {
                            echo"<b>Commande effectuée avec succès</b>";
                        }
                        else {
                            echo "<b>Commande non effectuée! Veuillez Réssayer</b>";
                        }
                    }
                    ?>
                </fieldset>
            </form>
        </section>
            
