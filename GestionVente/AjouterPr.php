<?php 
        session_start(); 
        include('Menu.php');
        require_once('..\connexion.php');
?>
    <style>
        body {
            font-family: "Trebuchet MS", sans-serif;
        }

    </style>

    <div class="container col-md-4 col-md-offset-4">
        <div class="panel panel-primary marge60">
            <div class="panel-heading"> Créer un produit </div>
            <div class="panel-body">
                <form method="post" action="" class="form-block">
                    Id Produit :
                    <input type="text" name=IdProduit class="form-control"> 
                    Catégorie :
                    <input type="text" name=Catégorie class="form-control">
                    Désignation :
                    <input type="text" name=Désignation class="form-control">
                    Photo :
                    <input type="file" name=Photo class="form-control">
                    Prix :
                    <input type="text" name=Prix class="form-control">
                    Id Fournisseur :
                    <input type="text" name=IdFour class="form-control">
                    
                    <center><button type="submit" name="submit" class="btn btn-success marge20"> <span class="glyphicon glyphicon-save"></span> &nbsp; Enregistrer</button></center>
                </form>
            </div>
        </div>
    </div>
 
    <?php 
            if(isset($_POST['submit'])){
                $sql1 = "INSERT INTO produits(IdProduit,Catégorie,Désignation,Photo,Prix,Quantité,IdFour) values('$_POST[libelle]','$_POST[prix]','$_POST[quantite]')";
                mysqli_query($liaison,$sql1);
            }
    ?>
</body>

</html>
input[type="file"] {
    display: none;  
}
<select  name="IdFour" style="margin-left:10px">
                  <option value="0">Choisir Fournisseur</option>
                  <option value="1">BF236N</option>
                  <option value="2">BW540S</option>
                  <option value="3">CA2309</option> 
                  <option value="4">FR4556Y</option>
					    	</select>
                            <select style="margin-left:10px" name="Catégorie">
							    <option value="0">Choisir catégorie</option>
                  <option value="1">Tables</option>
                  <option value="2">Chaises</option>
                  <option value="3">Tabourets</option> 
                  <option value="4">Buffets et Commodes</option>
                  <option value="5">Lits</option>
                  <option value="6">Meubles TV</option>       
                  <option value="7">Armoires</option>
                  <option value="8">Coiffeuses</option>
                  <option value="9">Vitrines et Bibliothèques</option>
                  <option value="10">Chevet</option>
                  <option value="11">Canapé</option>
                  <option value="12">Fauteuil</option>
                  <option value="13">Lits BÉBÉ</option>
					    	</select> 