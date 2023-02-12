<?php 
	$liaison2 = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($liaison2, "si d'achats de ventes et de stock de marchandises");
	
	if(isset($_POST["tampon"]) && $_POST["tampon"]=="recup")
	{
		$requete = "SELECT * FROM produits WHERE IdProduit = '".$_POST["ref_produit"]."';";
		$retours = mysqli_query($liaison2, $requete);
		$retour = mysqli_fetch_array($retours);
		$chaine = $retour["Désignation"]."|".$retour["Quantité"];
		print($chaine);
	}
	else
	{
		$requete = "UPDATE produits SET Quantité = Quantité + ".$_POST['qte_produit']." WHERE IdProduit = '".$_POST["ref_produit"]."';";
		$retours = mysqli_query($liaison2, $requete);
		if($retours==1)
			print("ok");
		else
			print("nok");
	}
	
	mysqli_close($liaison2);
?>