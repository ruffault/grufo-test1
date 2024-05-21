<?php
if (isset($_GET['id_editeur']) && is_numeric($_GET['id_editeur']))
{
	define('FPDF_FONTPATH','admin/font/');
	require('admin/fpdf.php');
	require 'inc/config.inc.php';
	require 'inc/connexion.inc.php';
	require 'inc/function.inc.php';
	require 'inc/session.inc.php';
	require 'inc/class.phpmailer.php';
	class PDF extends FPDF
	{
		function Header()
		{
			//Logo
			$this->Image('admin/css/logo_pdf.png',10,8);
			$this->Ln(17);
		}
	
		function Footer()
		{
			global $nom_editeur;
			$today_fr = date("d/m/Y H:i:s");
			//Positionnement à 1,5 cm du bas
			$this->SetY(-15);
			//Police Arial italique 8
			$this->SetFont('Arial','I',8);
			//Numéro de page centré
			$this->Cell(0,10,$today_fr . ' -- http://www.dicoland.com -- Catalogue ' . $nom_editeur . ' - Page '.$this->PageNo(),0,0,'R');
		}
	
		//Tableau coloré
		function FancyTable($title,$header,$data)
		{
			//Couleurs, épaisseur du trait et police grasse
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','I',16);

			// Titre du tableau
			$this->Cell(0,6,$title,1,0,'L',1);
			$this->Ln();			

			//En-tête
			//Couleurs, épaisseur du trait et police grasse
			$this->SetFillColor(255,165,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('','B',10);

			$w=array(140,50,20,30,20,17);
			for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],6,$header[$i],1,0,'C',1);
			$this->Ln();
			//Restauration des couleurs et de la police
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			//Données
			$fill=0;
			foreach($data as $row)
			{
				$this->Cell($w[0],5,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],5,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],5,$row[2],'LR',0,'R',$fill);
				$this->Cell($w[3],5,$row[3],'LR',0,'R',$fill);
				$this->Cell($w[4],5,$row[4],'LR',0,'R',$fill);
				$this->Cell($w[5],5,$row[5],'LR',0,'R',$fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w),0,'','T');
		}
	}
	
	$pdf=new PDF('L','mm','A4');
	$title = "Catalogue de l'éditeur ";
	$header=array('Nom','langues', 'reference', 'ISBN', 'Parution', 'Prix ed');
	$sql = "SELECT produit.nom_fr as nom, editeur.nom as nom_editeur,
								langues,
								reference,
								isbn,
								prix_editeur,
								date_parution
					FROM produit, editeur
					WHERE produit.id_editeur = '".addslashes($_GET['id_editeur'])."' 
					AND editeur.id_editeur = '".addslashes($_GET['id_editeur'])."'
					AND produit.sommeil <> 1
					ORDER BY nom
					;";
	$res = mysql_query($sql);
	while($val = mysql_fetch_array($res))
	{

		$data[] = array(
									0 => substr(ucwords(strtolower(trim($val['nom']))),0,80),
									1 => substr(ucwords(strtolower(trim($val['langues']))),0,30),
									2 => trim($val['reference']),
									3 => trim($val['isbn']),
									4 => invert_date(trim($val['date_parution'])),
									5 => trim($val['prix_editeur'])
									);
		$nom_editeur = ucwords(strtolower(trim($val['nom_editeur'])));
	}
	$title.= $nom_editeur;
	$pdf->SetFont('Arial','',9);
	$pdf->AddPage();
	$pdf->FancyTable($title,$header,$data);
	$pdf->Output();
	
}
else
{
	header('Location: '.$_SERVER['HTTP_REFERER'].'');
	die;
}
?>