<?php /* Smarty version 2.6.31, created on 2020-05-31 13:28:05
         compiled from fr/good.tpl */ ?>
<?php if ($_GET['commande']): ?>
<div class='paiement'>
  <h2><span class="deco">></span> 6 - Félicitations</h2>
  <p>
    Vous avez réglé votre commande par carte bancaire.
    Votre commande, référencée <strong><?php echo $_GET['commande']; ?>
</strong>,
    a bien été enregistrée par nos services.
  </p>
  <?php if ($_SESSION['ebook']): ?>
  <p>
  <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount'>Vous pouvez accèder à vos ebooks</a>
  La partie de votre commande qui comporterait une livraison peut être suivie comme suit: 
  <p>
  <?php endif; ?>
  <p>
    A chaque étape de traitement de votre commande, vous allez recevoir
    un email. Vous pouvez suivre, pas à pas, 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande'>le traitement de votre commande</a>.
    Nous sommes à votre entière disposition, n'hésitez pas à <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>nous poser vos questions.</a>
  </p>

  <p>
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0'>Continuer la visite du catalogue</a>
  </p>
</div>
<?php endif; ?>