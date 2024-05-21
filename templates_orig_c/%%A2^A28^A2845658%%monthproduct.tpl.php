<?php /* Smarty version 2.6.31, created on 2019-10-30 01:08:46
         compiled from fr/monthproduct.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'fr/monthproduct.tpl', 4, false),array('modifier', 'utf8_encode', 'fr/monthproduct.tpl', 9, false),)), $this); ?>

<h3>Produit du mois</h3>
<div id="monthproduct" class="border">
<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie']) : product_link($_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie'])); ?>
" style="text-decoration: none;">
<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['monthproduct']['id_produit']; ?>
_icon.jpg" alt="" />
</a><br /><br/>
<h4>
<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie']) : product_link($_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie'])); ?>
">
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
</h4>
<br/>
<br>
</div>

<h3><marquee behavior="scroll" direction="left"><center>&#x260E Annonce  &#9742 </center></h3></marquee>

<br> </br> <br> </br>

		  <p> <b>  <h4>Confiez vos travaux d'&eacutecriture, traduction, mise en page et maquette &agrave des professionnels ! Nos comp&eacutetences vont de l'&eacutecrit &agrave l'impression et/ou la mise en ligne dans les domaines suivants :   </h4> </b> </p> 
		<p>  <h4>  - &Eacutecrivain public : r&eacutedaction de courriers administratifs et/ou officiels;  </h4> </p>
		<p>  <h4> - Conseiller en &eacutecriture : r&eacutedaction, &eacutecriture, r&eacute&eacutecriture et correction de textes divers (r&eacutecits de vie, r&eacutecits d'entreprise, rapports, etc.); </h4> </p>
		<p>  <h4>   - Traducteur (de et vers l'anglais, l'arabe, le japonais, etc.); </h4> </p>
	        <p>  <h4>  - Relecteur-correcteur : de tous types d'&eacutecrits (livres, rapports, documents officiels, blogs, cartes et menus de restaurant, etc.);</h4> </p>
                <p>  <h4> - Maquettiste de toutes sortes de documents : livres, menus de restaurant, cartes de visite, etc. </h4> </p>


Contactez-nous par le biais de Dicoland/La Maison du dictionnaire <br><br> T&eacutel :
   +33 (0) 1 43 22 12 93</p> 

Fax : 
 + 33 (0) 1 43 22 01 77</p> 


<p id="adresse"><a href="mailto:contacts@dicoland.com">E-mail : contacts@dicoland.com</a></p>


		</li> <br/>
</div>