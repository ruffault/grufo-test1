<?php
if ($_GET['id_categ'])
{
	define('FPDF_FONTPATH','font/');
	require('fpdf.php');
	include ("include/verifsession.inc.php");
	include ("include/connexion.inc.php");
	
	class PDF extends FPDF
	{
		function Header()
		{
			//Logo
			$this->Image('css/logo_pdf.png',10,8);
			$this->Ln(17);
		}
	
		function Footer()
		{
			global $categorie;
			//Positionnement à 1,5 cm du bas
			$this->SetY(-15);
			//Police Arial italique 8
			$this->SetFont('Arial','I',8);
			//Numéro de page centré
			$this->Cell(0,10,$categorie . ' - Page '.$this->PageNo(),0,0,'R');
		}
	
		//Tableau coloré
		function FancyTable($header,$data)
		{
			//Couleurs, épaisseur du trait et police grasse
			$this->SetFillColor(255,165,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B');
			//En-tête
			$w=array(147,72,20,20,16);
			for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
			$this->Ln();
			//Restauration des couleurs et de la police
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			//Données
			$fill=0;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
				$this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w),0,'','T');
		}
	}
	
	$pdf=new PDF('L','mm','A4');
	$header=array('Nom','Auteur','nb pages', 'nb termes', 'Prix euro');
	$sql = "SELECT produit.nom_fr as nom,
								auteur.nom AS auteur,
								nb_pages,
								nb_termes,
								categorie.nom_fr AS categorie,
								produit.prix
					FROM produit, categorie, auteur
					WHERE produit.id_categorie = categorie.id_categorie
					AND auteur.id_auteur = produit.id_auteur
					AND (
						categorie.id_categorie='".addslashes($_GET['id_categ'])."'
						OR categorie.id_categorie_parent='".addslashes($_GET['id_categ'])."'
							);";
	$res = mysqli_query($link,$sql);
	while($val = mysqli_fetch_array($res))
	{
		$nb_pages = "";
		$nb_termes = "";
		if($val['nb_pages'] != 0)
			$nb_pages = $val['nb_pages'];
		if($val['nb_termes'] != 0)
			$nb_termes = $val['nb_termes'];
	
		$data[] = array(
									0 => substr(trim($val['nom']),0,80),
									1 => substr(ucwords(strtolower(trim($val['auteur']))),0,38),
									2 => trim($nb_pages),
									3 => trim($nb_termes),
									4 => trim($val['prix'])
									);
		$categorie = trim($val['categorie']);
	}
	$pdf->SetFont('Arial','',9);
	$pdf->AddPage();
	$pdf->FancyTable($header,$data);
	$pdf->Output();
}
?>
