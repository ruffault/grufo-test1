<?php /* Smarty version 2.6.31, created on 2024-05-17 12:16:12
         compiled from fr/formfraisport.tpl */ ?>
<div id='pagefraisport'>
  <h2><span class="deco">></span> 4 - Mode d'expédition</h2>

  <?php if ($_SESSION['erreur_fraisport'] == 1): ?>
  <div id="erreur">
  <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
	Veuillez choisir un type de transport.<br />
  </div>
  <?php endif; ?>

  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
veriffraisport.php">
  <div id="selectport">

    <?php unset($this->_sections['frais_port']);
$this->_sections['frais_port']['name'] = 'frais_port';
$this->_sections['frais_port']['loop'] = is_array($_loop=$this->_tpl_vars['frais_port']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['frais_port']['show'] = true;
$this->_sections['frais_port']['max'] = $this->_sections['frais_port']['loop'];
$this->_sections['frais_port']['step'] = 1;
$this->_sections['frais_port']['start'] = $this->_sections['frais_port']['step'] > 0 ? 0 : $this->_sections['frais_port']['loop']-1;
if ($this->_sections['frais_port']['show']) {
    $this->_sections['frais_port']['total'] = $this->_sections['frais_port']['loop'];
    if ($this->_sections['frais_port']['total'] == 0)
        $this->_sections['frais_port']['show'] = false;
} else
    $this->_sections['frais_port']['total'] = 0;
if ($this->_sections['frais_port']['show']):

            for ($this->_sections['frais_port']['index'] = $this->_sections['frais_port']['start'], $this->_sections['frais_port']['iteration'] = 1;
                 $this->_sections['frais_port']['iteration'] <= $this->_sections['frais_port']['total'];
                 $this->_sections['frais_port']['index'] += $this->_sections['frais_port']['step'], $this->_sections['frais_port']['iteration']++):
$this->_sections['frais_port']['rownum'] = $this->_sections['frais_port']['iteration'];
$this->_sections['frais_port']['index_prev'] = $this->_sections['frais_port']['index'] - $this->_sections['frais_port']['step'];
$this->_sections['frais_port']['index_next'] = $this->_sections['frais_port']['index'] + $this->_sections['frais_port']['step'];
$this->_sections['frais_port']['first']      = ($this->_sections['frais_port']['iteration'] == 1);
$this->_sections['frais_port']['last']       = ($this->_sections['frais_port']['iteration'] == $this->_sections['frais_port']['total']);
?>
      <?php if ($this->_tpl_vars['unique'] == 1): ?>
			  <input type="hidden" name="fraisport_mode" value="<?php echo $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode']; ?>
" />
			<?php elseif ($_SESSION['fraisport_mode'] == $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode']): ?>
			  <input type="radio" name="fraisport_mode" value="<?php echo $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode']; ?>
" checked="checked" />
      <?php else: ?>
        <input type="radio" name="fraisport_mode" value="<?php echo $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode']; ?>
" />
      <?php endif; ?>

      <?php if ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_fr): ?>Colissimo suivi (délai indicatif : 2 jours)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == courrier_ordinaire): ?>Courrier ordinaire <br> (<span style="color:red;font-weight:bold">Attention pas de possibilité de suivi en courrier ordinaire</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_a): ?>Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 8 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_b): ?>Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 8 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_c): ?>Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_d): ?>Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_b): ?>Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_c): ?>Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 12 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_d): ?>Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 15 jours</span>)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_int): ?>Colissimo suivi international (délai indicatif : 4 jours)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_dom): ?>Colissimo DOM suivi (délai indicatif : 4 jours)
      <?php endif; ?>
      - <strong><?php echo $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['prix']; ?>
 €</strong><br />
    <?php endfor; endif; ?>
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>