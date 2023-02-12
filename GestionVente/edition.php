<?php

if(isset($_GET['info']) && $_GET['info']!="")
{

$liaison2 = mysqli_connect('localhost', 'root', '');
mysqli_select_db($liaison2, "si d'achats de ventes et de stock de marchandises");

$tab_param = explode("-",$_GET['info']);
$num_cli = $tab_param[0];
$num_com = $tab_param[1];

$c_civ=""; $c_nom=""; $c_pre=""; $c_date=""; $c_livr=""; $Fnum=""; $c_tot="";
$c_ref =""; $c_des=""; $c_qte=""; $c_pht=0; $c_mht=0; $compteur=0;

$requete = "SELECT * FROM clients a, commandes b, detail c WHERE a.Client_num=".$num_cli." AND b.IdCommande=".$num_com." AND c.Detail_com=".$num_com." ";
$retours = mysqli_query($liaison2, $requete);

require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while($retour = mysqli_fetch_array($retours))
{
    if($c_civ=="")
    {
        $c_civ = $retour["Client_civilité"];
        $c_nom=$retour["Client_nom"]; $c_pre=$retour["Client_prénom"];
        $c_date=$retour["DateCommande"]; $c_livr=$retour["DateLivraison"]; $c_tot=$retour["Com_Montant"];
        

        $pdf->Cell(35,10,"",0,1,'R');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(120,5,"B Mobilier",0,0,'L');
        $pdf->Cell(60,5,$c_civ." ".$c_pre." ".$c_nom,0,1,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(120,5,"10 Boulevard Zerktouni Maarif",0,0,'L');
        $pdf->Cell(60,5,"Votre adresse",0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(120,5,"20100 Casablanca",0,0,'L');
        $pdf->Cell(60,5,"Votre ville",0,1,'L');
        $pdf->Cell(35,10,"",0,1,'R');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(120,5,utf8_decode("Votre commande numéro : ").$num_com,0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60,5,"Date de commande : ".$c_date,0,1,'L');
        $pdf->Cell(120,5,"",0,0,'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60,5,"Date de livraison : ".$c_livr,0,1,'L');
        $pdf->Cell(35,10,"",0,1,'R');

         {  $pdf->SetFont('Arial','B',11);
            $pdf->SetTextColor(0,0,255);
            $pdf->Cell(22,10,"Id Produit",1,0,'L');
            $pdf->Cell(70,10,utf8_decode("Désignation"),1,0,'L');
            $pdf->Cell(20,10,utf8_decode("Quantité"),1,0,'R');
            $pdf->Cell(30,10,"P.U HT",1,0,'R');
            $pdf->Cell(30,10,"Montant HT",1,1,'R');
         }
         
    }
    
    $requete = "SELECT * FROM produits WHERE IdProduit='".$retour["Detail_idP"]."';";
    $reponses = mysqli_query($liaison2, $requete);
    $reponse = mysqli_fetch_array($reponses);
   
    $c_ref = $reponse["IdProduit"]; $c_des=$reponse["Désignation"];
    $c_qte = $retour["Detail_qte"]; $c_pht=number_format($reponse["Prix"],2, ',', ' ');
    $c_mht = number_format($retour["Detail_qte"]*$reponse["Prix"],2, ',', ' ');

    $pdf->SetFont('Arial','',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(22,10,$c_ref,1,0,'L');
    $pdf->Cell(70,10,utf8_decode($c_des),1,0,'L');
    $pdf->Cell(20,10,$c_qte,1,0,'R');
    $pdf->Cell(30,10,$c_pht.' '.'DH',1,0,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,10,$c_mht.' '.'DH',1,1,'R');
    $pdf->SetFont('Arial','',9);
    $compteur ++;

}

$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,10,"",0,1,'R');
$pdf->Cell(140,10,"Montant total HT : ",0,0,'R');
$pdf->Cell(10,10,"",0,0,'R');
$pdf->Cell(32,10,number_format($c_tot, 2, ',', ' ').' '.'DH',1,1,'R');
$pdf->Cell(140,10,"TVA : 20%",0,0,'R');
$pdf->Cell(10,10,"",0,0,'R');
$pdf->Cell(32,10,number_format($c_tot/5, 2, ',', ' ').' '.'DH',1,1,'R');
$pdf->Cell(140,10,"Montant total TTC : ",0,0,'R');
$pdf->Cell(10,10,"",0,0,'R');
$pdf->Cell(32,10,number_format($c_tot + $c_tot/5, 2, ',', ' ').' '.'DH',1,1,'R');
$pdf->Cell(20,20,"",0,1,'R');
$pdf->SetFont('Arial','U',11);

$restant = 120 - $compteur*10;
$pdf->Cell(30,$restant,"",0,1,'R');
$pdf->Cell(60,10,utf8_decode("Mentions légales et conditions :"),0,1,'L');
$pdf->SetFont('Arial','I',9);
$pdf->Cell(180,10,utf8_decode("Directeur de la société B Mobilier"),0,1,'L');

$nom_fichier ="factures/".$num_cli."-".$num_com.".pdf";
$pdf->Output($nom_fichier,'F');

$pdf->Output();

mysqli_close($liaison2);
}
?>