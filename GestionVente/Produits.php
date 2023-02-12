<?php
include("../connexion.php");
include('Menu.php');
?>
    <link rel="stylesheet" href="Styles/Produits.css" type="text/css">

        <div class="text">Articles</div><br>
        <form name="formauto" method="Post" action="">
            <li class="search">
                <input type="text" name="motcle" placeholder="Recherche par désignation...">
                <button class="sear" name="btsearch" type="submit">
                    <i class='bx bx-search ic'></i>
                </button>
            </li>
        <form>   
       <div id="articles" >
        <?php
    
		if(isset($_POST['btsearch']))
		{$desi=$_POST['motcle'];
		$reqSelect="select * from produits where Désignation like '%$desi%'";
		}
		else {
		$reqSelect="select * from produits";
		}
			$resultat=mysqli_query($liaison,$reqSelect);
			while($ligne=mysqli_fetch_assoc($resultat))
			{
		?>
            <div class="box">
                    <div  class="imbox"><img src="<?php echo $ligne['Photo'] ?>"/></div>
                    <p > <span class="p">Id Produit:</span>
                        <?php echo $ligne['IdProduit']; ?> </p>
	                <p> <span class="p">Catégorie:</span>
                        <?php echo $ligne['Catégorie']; ?></p> 
	                <p> <span class="p">Désignation:</span>
	                    <?php echo $ligne['Désignation']; ?> </p>
                    <p> <span class="p">Prix HT:</span>
	                    <?php echo $ligne['Prix']; ?> DH</p>
                    <p> <span class="p">Quantité:</span>
	                    <?php echo $ligne['Quantité']; ?> </p>
                    <p> <span class="p">Id fournisseur:</span> 
                        <?php echo $ligne['IdFour'];  ?>  </p><br>
                    <P><a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class=Pr href="SupprimerProduit.php?supP=<?php echo $ligne['IdProduit'];?>"> <img class="D" src="..\images\Deletee.png"></a>
                        <a href="ModifierProduit.php?modP=<?php echo $ligne['IdProduit'];?>"> <img class="D" src="..\images\modifierr.png"></a>
                    </P> 
		    </div>
		        <?php } ?>
        </div>


        </section>

    </body>
</html>