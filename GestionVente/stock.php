<?php 
	include("../connexion.php");
	include("commun/naav.php");
	
?>
<script language='javascript' type="text/javascript">
function recolter()
{
	document.getElementById("formulaire").request({
		onComplete:function(transport){
			if(document.getElementById('tampon').value=='recup')
			{
				var tab_info = transport.responseText.split('|');
				document.getElementById('des_produit').value = tab_info[0];
				document.getElementById('qte_produit_avt').value = tab_info[1];
				document.getElementById('qte_produit_aps').value = "";
				document.getElementById('qte_produit').value = "";
			}
			else
			{
				if(transport.responseText=="ok")
				{
					document.getElementById('qte_produit_aps').value= parseInt(document.getElementById('qte_produit_avt').value) + parseInt(document.getElementById('qte_produit').value);
					document.getElementById('msg_reponse').innerText = "Le stock a été mis à jour avec succès";
				}
				else
					document.getElementById('msg_reponse').innerText = "Une erreur est survenue, le stock est inchangé";
			}
		}
	});
}
</script>

			<div style="width:100%;display:block;text-align:center;">
			</div>
			
			<div class="div_saut_ligne" style="height:30px;">
			</div>						
			
			<div style="float:left;width:10%;height:40px;"></div>
			<div style="float:left;width:80%;height:auto;text-align:center;">
			<div class="titre_h1">
			<h1>Approvisionnement des stocks du magasin</h1>
			</div>
			</div>
			<div style="float:left;width:10%;height:40px;"></div>
			
			<div class="div_saut_ligne" style="height:30px;">
			</div>
			
			<div style="float:left;width:10%;height:250px;"></div>
			<div style="float:left;width:80%;height:250px;text-align:center;">
			<form id="formulaire" name="formulaire" method="post" action="rep_stock.php">
				<div class="titre_h1" style="height:280px;">
					<div style="width:10%;height:55px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:left;">
						Produit à mettre à jour :<br />
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
					<div style="width:10%;height:65px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:left;">
						Désignation du produit :<br />
						<input type="text" id="des_produit" name="des_produit" style="width:90%;" disabled />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					
					
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:center;">
						Quantité en + ou - :<br />
						<input type="number" id="qte_produit" style="width:50%" name="qte_produit" />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:center;">
						Quantité avt MAJ :<br />
						<input type="text" id="qte_produit_avt" style="width:45%" name="qte_produit_avt" disabled />
					</div>
					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:20%;height:75px;float:left;font-size:17px;font-weight:bold;text-align:center;">
						Quantité aps MAJ :<br />
						<input type="text" id="qte_produit_aps" style="width:45%" name="qte_produit_aps" disabled />
					</div>					
					<div style="width:10%;height:9px;float:left;"></div>					
			<div class="div_saut_ligne" style="height:5px;">

			</div>
					
					<div style="width:10%;height:9px;float:left;"></div>
					<div style="width:35%;height:75px;float:left;font-size:17px;font-weight:bold;margin-left:1px;text-align:left;">
						<input type="button" id="valider" name="valider" value="Valider la mise à jour" onclick="document.getElementById('tampon').value='maj';recolter();" />
					</div>
					<div style="width:10%;height:35px;float:left;"></div>
					<div id="msg_reponse" style="width:35%;height:10px;float:left;font-size:19px;margin-left:9px;font-weight:bold;text-align:left;color:white;text-shadow: 2px 2px 5px #53c3d6, 0 0 25px black, 0 0 5px black;">
						<?php 
							echo "Réponse serveur";
						?>
					</div>
					<div style="width:10%;height:95px;float:left;"></div>					
					
				</div>
			</form>
			</div>
			<div style="float:left;width:10%;height:250px;"></div>			
			
			<div class="div_saut_ligne" style="height:50px;">
			</div>
						
<?php 
	include("commun/foot.php");
?>
</section>