<?php
// Pour �viter les problemes de timeout de max_execution_time dans php.ini
set_time_limit(90);
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/function.inc.php");
require_once "include/excel/class.writeexcel_workbook.inc.php";
require_once "include/excel/class.writeexcel_worksheet.inc.php";
// on indique a unavigateur qu'on va exporter un CSV
// Sélection de la table à exporter
$header='';
$data='';
$select = "SELECT email,nom,prenom,societe,mailinglist,pays,inscr_date FROM membre ORDER BY inscr_date asc";
$export = mysqli_query ($link,$select) or die ( "Sql error : " . mysqli_error($link ) );

$fields = mysqli_num_fields ( $export );
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysqli_fetch_field_direct( $export , $i )->name . "\t"; // GR 18/10/20
}

while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Classeur_Emails.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>
