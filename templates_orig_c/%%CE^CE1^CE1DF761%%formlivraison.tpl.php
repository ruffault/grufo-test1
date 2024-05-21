<?php /* Smarty version 2.6.31, created on 2019-10-31 09:51:14
         compiled from fr/formlivraison.tpl */ ?>



<div id='formlivraison'>
  <h2><span class="deco">></span> 2 - Adresse de livraison</h2>

  <div id="currentadresse">
  <?php if ($this->_tpl_vars['infomembre']['nomsociete']): ?>Société <?php echo $this->_tpl_vars['infomembre']['nomsociete']; ?>
<br /><br /><?php endif; ?>
  <strong>
  <?php if ($this->_tpl_vars['infomembre']['civilite'] == 1): ?>
    M.
  <?php elseif ($this->_tpl_vars['infomembre']['civilite'] == 2): ?>
    Mme
  <?php elseif ($this->_tpl_vars['infomembre']['civilite'] == 3): ?>
    Mlle
  <?php endif; ?>
  
  <?php echo $this->_tpl_vars['infomembre']['nom']; ?>

  <?php echo $this->_tpl_vars['infomembre']['prenom']; ?>
</strong><br />
  <?php echo $this->_tpl_vars['infomembre']['adresse1']; ?>
<br />
  <?php if ($this->_tpl_vars['infomembre']['adresse2']): ?><?php echo $this->_tpl_vars['infomembre']['adresse2']; ?>
<br /><?php endif; ?>
  <?php if ($this->_tpl_vars['infomembre']['adresse3']): ?><?php echo $this->_tpl_vars['infomembre']['adresse3']; ?>
<br /><?php endif; ?>
  <?php echo $this->_tpl_vars['infomembre']['cp']; ?>
 <?php echo $this->_tpl_vars['infomembre']['ville']; ?>
<br />
  <?php echo $this->_tpl_vars['infomembre']['pays_membre']; ?>
 <?php echo $this->_tpl_vars['infomembre']['etat']; ?>
<br /><br />
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
verifformlivraison.php">
    <input type="hidden" name="precis" value="0" />
    <input type="image" name="livraison_submit" value="Utiliser cette adresse" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/adresse.gif" />
  </form>
  Ou
  <br />
  <br />
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
verifformlivraison.php">
    <input type="hidden" name="premierpassage" value="1" />
    <input type="hidden" name="precis" value="1" />
    <input type="image" name="livraison_submit" value="Utiliser une autre adresse" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/autreadresse.gif" />
  </form>
  </div>
</div>

