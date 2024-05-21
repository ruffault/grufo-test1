<?php /* Smarty version 2.6.31, created on 2019-11-18 20:06:26
         compiled from fr/bad.tpl */ ?>
<?php if ($_GET['commande']): ?>
<div class='paiement'>
  <h2><span class="deco">></span>Informations manquantes</h2>
  <p>
    Notre service bancaire nous a informé que le paiement n'a pas pu être honoré.
    Par conséquent, nous avons le regret de vous informer que votre commande,
    référencée <strong><?php echo $_GET['commande']; ?>
</strong> ne sera pas traitée.
  </p>
 
  <p>
    Nous restons cependant à votre entière disposition, n'hésitez pas à 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>nous poser vos questions.</a>
  </p>
  <p>
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0'>Continuer la visite du catalogue</a>
  </p>
</div>
<?php endif; ?>