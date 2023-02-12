<?php 
	$titre="";
	if(isset($url_en_cours) && $url_en_cours!="")
		$titre=$url_en_cours;
	else
		$titre = "Approvisionnement les stocks";
    include("Menu.php");
?>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?php echo $titre; ?></title>
<meta name="description" content="Gestion des ventes et stocks" />
<meta name="robots" content="index,follow" />
<meta http-equiv="content-language" content="fr" />
<link href='Styles/gest.css' rel='stylesheet' type='text/css' />
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="js/prototype.js" type="text/javascript"></script>

</head>
    
	<div class="div_conteneur_parent">
	
		<div class="div_conteneur_page">
			<a href="." target="_self">
			<img src="../images/sv.png" style="width:100px;height:55px;border:none;" align="left" alt="Les ventes" />
			</a>		
			<div class="titre_page"><h1><?php echo $titre; ?></h1></div>
			
			<div class="div_int_page">