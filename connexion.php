<?php 
 /*
 Ici interviendront les informations de connexion pour ex�cuter des requ�tes
 sur la base de donn�es MySql.
 */
   $serveur="localhost";
   $user="root";
   $pw="";
   $bdd="si d'achats de ventes et de stock de marchandises";

	$url_en_cours=$_SERVER['REQUEST_URI'];
	$url_en_cours=substr($url_en_cours,strripos($url_en_cours,"/")+1);
	$url_en_cours = str_replace(".php","",str_replace("-"," ",$url_en_cours));
	$url_en_cours = strtoupper(substr($url_en_cours,0,1)).substr($url_en_cours,1);	
	//echo $url_en_cours;
	
	$liaison = mysqli_connect($serveur,$user,$pw);
	mysqli_select_db($liaison, $bdd);
?>