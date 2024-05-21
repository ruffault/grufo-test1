<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/header.inc.php");
include ("include/function.inc.php");
?>

<div id="page">
<div id="menutop">
	<div id="logout">Administrateur - <a href="logout.php">Se d�connecter</a></div>
  <img src="css/admin.gif" alt="" /><h1>Console d'administration</h1>
</div>
<div id="menutop2">
  <ul>
    <li><a href="index2.php?page=addproduct"><img src="css/add.gif" alt="" title="Ajouter" alt="Ajouter" /></a></li>
    <li><a href="index2.php?page=searchproduct"><img src="css/modif.gif" alt="Modifier" title="Modifier" /></a></li>
    <li><a href="index2.php?page=users&amp;sens=1"><img src="css/users.gif" alt="Membre" title="Membre" /></a></li>
    <li><a href="index2.php?page=categ"><img src="css/categ.gif" alt="Cat�gorie" title="Cat�gorie" /></a></li>
    <li><a href="index2.php?page=vitrine"><img src="css/vitrine.gif" alt="Vitrine" title="Vitrine" /></a></li>
    <li><a href="index2.php?page=viewcommande"><img src="css/traite.gif" alt="A traiter" title="A traiter" /></a></li>
    <li><a href="index2.php?page=viewcommande&amp;traite=1"><img src="css/passe.gif" alt="Trait�es" title="Trait�es" /></a></li>
    <li><a href="index2.php?page=listarchive"><img src="css/archive.gif"  alt="Archive" title="Archive" /></a></li>
    <li><a href="index2.php?page=stat"><img src="css/stat.gif"  alt="Stats" title="Stats" /></a></li>
    <li><a href="index2.php?page=list"><img src="css/mail.gif"  alt="Mailing" title="Mailing" /></a></li>
    <li><a href="index2.php?page=emailings"><img src="css/emailings.gif"  alt="Gestion des E-Mailings HTML" title="Gestion des E-Mailings HTML" /></a></li>
    <li><a href="index2.php?page=messages"><img src="css/messages.gif" alt="Gestion des Messages de la page d'accueil" title="Gestion des Messages de la page d'accueil" /></a></li>
    <li><a href="index2.php?page=frais_port"><img src="css/laposte.gif" alt="Gestion des Frais de Port" title="Gestion des Frais de Port" /></a></li>
    <li><a href="index2.php?page=reject_order"><img src="css/warning.gif" alt="reject order" title="Commande rejeter" /></a></li>
  </ul>
</div>
<div id="content">
<?php
if (!isset($_GET["page"]))
{
	$_GET["page"] = '';
  include ("include/default.inc.php");
}

if ($_GET["page"] == "dump")
  include ("include/dump.inc.php");
if ($_GET["page"] == "addproduct")
  include ("include/formaddproduct.inc.php");
if ($_GET["page"] == "confirmmodif")
  include ("include/confirmmodif.inc.php");
 if ($_GET["page"] == "confirmtrad")
  include ("include/confirmtrad.inc.php");
if ($_GET["page"] == "confirmajout")
  include ("include/confirmajout.inc.php");
if ($_GET["page"] == "searchproduct")
  include ("include/formsearchproduct.inc.php");
if ($_GET["page"] == "showpic")
  include ("include/showpic.inc.php");
if ($_GET["page"] == "users")
  include ("include/users.inc.php");
if ($_GET["page"] == "detailuser")
  include ("include/detailuser.inc.php");
if ($_GET["page"] == "categ")
  include ("include/managecateg.inc.php");
if ($_GET["page"] == "vitrine")
  include ("include/vitrine.inc.php");
if ($_GET["page"] == "viewcommande")
  include ("include/viewcommande.inc.php");
if ($_GET["page"] == "reject_order")
  include ("include/reject_order.inc.php");
if ($_GET["page"] == "order")
{
  include 'include/order.inc.php';
}
if ($_GET["page"] == "listarchive")
  include ("include/listarchive.inc.php");
if ($_GET["page"] == "list")
  include ("include/list.inc.php");
if ($_GET["page"] == "emailings")
  include ("include/emailings.inc.php");
if ($_GET["page"] == "disable")
  include ("include/disableform.inc.php");
if ($_GET["page"] == "showmail")
  include ("include/showmail.inc.php");
if ($_GET["page"] == "stat")
  include ("include/stat.inc.php");
if ($_GET["page"] == "messages")
  include ("include/formmessages.inc.php");
if ($_GET["page"] == "frais_port")
  include ("include/formfrais_port.inc.php");
//include ("include/acceuil.inc.php");
?>
</div>
<?php
include ("include/footer.inc.php");

?>
