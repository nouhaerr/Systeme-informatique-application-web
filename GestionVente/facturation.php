<?php 
	include("../connexion.php");
	include("commun/naav.php");
?>
<script language='javascript' type="text/javascript">
function recolter()
{
	document.getElementById("formulaire").request({
		onComplete:function(transport){
			switch(document.getElementById('param').value)
			{
				case 'recup_client':
					var tab_info = transport.responseText.split('|');
					document.getElementById('civilite').value = tab_info[0];
					document.getElementById('nom_client').value = tab_info[1];
					document.getElementById('prenom_client').value = tab_info[2];			
				break;
				
				case 'recup_article':
					var tab_info = transport.responseText.split('|');
					document.getElementById('designation').value = tab_info[0];
					document.getElementById('puht').value = tab_info[1];
					document.getElementById('qte').value = tab_info[2];					
				break;
				
				case 'creer_client':
					var rep = transport.responseText;
					if(rep=="nok")
						alert("Le client existe déjà");
					else
					{
						var liste = document.getElementById("ref_client");
						var option = document.createElement("option");
						option.value = rep;
						option.text = rep;
						liste.add(option);
						liste.selectedIndex = liste.length-1;						
					}
				break;	

				case 'facturer':
					var reponse = transport.responseText;
                    if(transport.responseText=="nok")
                        alert("Une erreur est survenue");
                    else
                    {
                       alert("La facture a été validée avec succès");
                       document.getElementById("editer").innerHTML = "<input type='button' value='Editer la facture' onclick='window.open(\"edition.php?info="+ reponse +"\")'/>";
                    }
                break;					
				
			}	
		}
	});
}
</script>
		<div style="width:100%;display:block;text-align:center;">
		</div>
			
		<div class="div_saut_ligne" style="height:20px;">
		</div>						
			
		<div style="float:left;width:10%;height:20px;"></div>
		<div style="float:left;margin-left:97px;width:60%;height:auto;text-align:center;">
			<div class="titre_h1">
			<h1>Facturation des Clients</h1>
			</div>
		</div>
		<div style="float:left;width:10%;height:40px;"></div>
			
		<div class="div_saut_ligne" style="height:30px;">
		</div>
			
		<div style="float:left;width:10%;height:350px;"></div>
		<div style="float:left;width:80%;height:300px;text-align:center;">
			<form id="formulaire" name="formulaire" method="post" action="rep_facture.php">
				<div class="titre_h1" style="height:350px;">
					<div style="width:10%;height:50px;float:left;"></div>
					<div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:orange;text-shadow: 2px 2px 5px black, 0 0 25px red, 0 0 5px white;">
						<u>Informations du client</u><br />
					</div>
					<div style="width:10%;height:40px;float:left;"></div>
					<div style="width:35%;height:50px;float:left;font-size:17px;font-weight:bold;text-align:left;">
						<input type="button" id="creer_client" name="creer_client" value="Créer le client" style="margin-left:55px" onclick="document.getElementById('param').value='creer_client';recolter();" />
					</div>
					<div style="width:10%;height:50px;float:left;"></div>

					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:15%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Réf. Client :<br />
						<select id="ref_client" name="ref_client" onchange="document.getElementById('param').value='recup_client';recolter();" style="width:90%;">
							<option value="0">Choisir client</option>
							<?php 
								$requete = "SELECT Client_num FROM clients ORDER BY Client_num;";
								$retours = mysqli_query($liaison, $requete);
								while($retour = mysqli_fetch_array($retours))
								{
									echo "<option value='".$retour["Client_num"]."'>".$retour["Client_num"]."</option>";
								}
							?>
						</select>
					</div>
					<div style="width:15%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Civilité :<br />
						<select id="civilite" name="civilite" style="width:90%;">
							<option>Monsieur</option>
							<option>Madame</option>
						</select>
					</div>
					<div style="width:25%;height:70;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Nom du client :<br />
						<input type="text" id="nom_client" name="nom_client" />
					</div>
					<div style="width:25%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Prénom du client :<br />
						<input type="text" id="prenom_client" name="prenom_client" />
					</div>					

					<div style="width:10%;height:2px;float:left;"></div>
					<div style="width:80%;height:10px;float:left;font-size:20px;font-weight:bold;text-align:left;color:orange;text-shadow: 2px 2px 5px black, 0 0 25px red, 0 0 5px white;">
						<u>Ajout des produits commandés</u><br />
					</div>
					<div style="width:10%;height:40px;float:left;"></div>	
					
					<div style="width:10%;height:60px;float:left;"></div>
					<div style="width:15%;height:70px;float:left;font-size:15px;font-weight:bold;text-align:left;">
						Id. Produit :<br />
						<select id="ref_produit" name="ref_produit" onchange="document.getElementById('param').value='recup_article';recolter();">
							<option value="0">Id. produit</option>
							<?php 
								$requete = "SELECT IdProduit FROM produits ORDER BY IdProduit;";
								$retours = mysqli_query($liaison, $requete);
								while($retour = mysqli_fetch_array($retours))
								{
									echo "<option value='".$retour["IdProduit"]."'>".$retour["IdProduit"]."</option>";
								}							
							?>
						</select>
					</div>
					<div style="width:15%;height:70px;float:left;font-size:15px;font-weight:bold;text-align:left;">
						Qté en stock :<br />
						<input type="text" id="qte" name="qte" disabled style="text-align:right;" />
					</div>
					<div style="width:27%;height:70px;float:left;font-size:15px;font-weight:bold;text-align:left;margin-left:10px;">
						Désignation du produit :<br />
						<input type="text" id="designation" name="designation" style="width:100%;" disabled />
					</div>
					<div style="width:25%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left;margin-left:10px;">
						Prix HT :<br />
						<input type="text" id="puht" name="puht" disabled style="text-align:right;width:50%" />
					</div>		
					<div style="width:10%;height:9px;float:left;"></div>				

					
					<div style="width:25%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Quantité commandée :<br />
						<input style="width:35%" type="number" id="qte_commande" name="qte_commande"/>
					</div>
					<div style="width:25%;height:70px;float:left;font-size:16px;font-weight:bold;text-align:left">
						Total de la commande HT:<br />
						<input style="width:35%" type="text" id="total_commande" name="total_commande" disabled />
					</div>
					<div style="width:20%;height:20px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						<input type="button" id="ajouter" name="ajouter" value="Ajouter" style="margin-top:15%;margin-right:5px;" onclick="plus_com();" /><br />
						<input type="text" id="param" name="param" style="visibility:hidden;" />
					</div>
					<div style="width:20%;height:25px;float:left;font-size:20px;font-weight:bold;text-align:left;">
						<input type="button" id="valider" name="valider" value="Valider" style="margin-left:5px;margin-top:15%;" onclick="document.getElementById('param').value='facturer';recolter();"/><br />
						<input type="text" id="chaine_com" name="chaine_com" style="visibility:hidden;" />
						<input type="text" id="total_com" name="total_com" style="visibility:hidden;" />						
					</div>			
					<div style="width:10%;height:75px;float:left;"></div>			
									
					
				</div>
			</form>
		</div>
			<div style="float:left;width:10%;height:310px;"></div>	

		<div class="div_saut_ligne" style="height:50px;">
		</div>						
			
		<div style="float:left;width:10%;height:25px;"></div>
		<div style="float:left;margin-left:57px;width:90%;height:auto;text-align:center;">
			<div class="titre_h1" style="float:left;height:auto;width:100%;padding-right:10px">
					<div style="width:5%;margin-left:20px;"></div>
					<div style="width:10%;float:left;margin-left:30px;font-size:16px;font-weight:bold;text-align:left;">
						Id.
					</div>
					<div style="width:10%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						Qté
					</div>
					<div style="width:35%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;overflow:hidden;">
						Désignation du produit
					</div>
					<div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						P.U HT
					</div>
					<div style="width:15%;height:25px;float:left;font-size:20px;font-weight:bold;">
						Montant HT
					</div>
					
					<div style="float:left;width:5%;height:25px;"></div>

					<div style="float:left;width:100%;height:auto;" id="det_com">
						<div class="bord"></div>
						<div class="suite">
							A0001
						</div>
						<div class="suite">
							1
						</div>
						<div class="des">
							Table à manger chêne gris
						</div>
						<div class="prix">
							6000 DH
						</div>
						<div class="prix" style="font-weight:bold;font-size:20px;">
							6000 DH
						</div>
						<div class="bord"></div>

					</div>		
					<div style="float:left; width:5%; height:25px;"></div>

                     <div style="float:left; width:100%; height:auto;" id="editer">
                        </div>
			</div>
		</div>
		<div style="float:left;width:10%;height:auto;"></div>	
				
		<div class="div_saut_ligne" style="height:48px;">
		</div>
   <script language='javascript' type="text/javascript">
	
	var tot_com = 0;
	
	function plus_com()
	{
		if(ref_client.value != 0 && ref_produit.value != 0 && qte_commande.value != "0" && qte_commande.value != "")
		{
			if(parseInt(qte_commande.value) > parseInt(qte.value))
				alert("La quantité en stock n'est pas suffisante pour honorer la commande");
			else
			{
				var ref_p = ref_produit.value;
				var qte_p = qte_commande.value;
				var des_p = designation.value;
				var pht_p = puht.value;
				
				tot_com = tot_com + qte_p*pht_p;
				total_commande.value = tot_com.toFixed(2);
				total_com.value = total_commande.value;
				chaine_com.value += "|" + ref_p + ";" + qte_p + ";" + des_p + ";" + pht_p;				
				facture();
			}
		}
	}
	
	function facture()
	{		
		var tab_com = chaine_com.value.split('|');
		var nb_lignes = tab_com.length;
		document.getElementById("det_com").innerHTML = "";
		for (ligne=0; ligne<nb_lignes; ligne++)
		{
			if(tab_com[ligne]!="")
			{
				var ligne_com = tab_com[ligne].split(';');
				document.getElementById("det_com").innerHTML += "<div class='bord'></div>";
				document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[0] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[1] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='des'>" + ligne_com[2] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='prix'>" + ligne_com[3] + " Dh </div>";
				document.getElementById("det_com").innerHTML += "<div class='prix' style='font-weight:bold;font-size:20px;'>" + (ligne_com[1]*ligne_com[3]).toFixed(2) + " DH </div>";
				document.getElementById("det_com").innerHTML += "<div class='bord'><input type='button' value='X' title='Supprimer le produit' style='height:20px;font-size:12px;' onclick='suppr(\"" + tab_com[ligne] + "\");' /></div>";											
			}
		}		
	}
	
	function suppr(ligne_s)
	{
		chaine_com.value = chaine_com.value.replace('|' + ligne_s, '');
		var tab_detail = ligne_s.split(';');
		
		total_commande.value = (total_commande.value -tab_detail[1]*tab_detail[3]).toFixed(2);
		total_com.value = total_commande.value;
		tot_com = total_com.value*1;
		
		facture();
	}
	
</script>			
<?php 
	include("commun/foot.php");
?>
</section>