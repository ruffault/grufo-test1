<?php /* Smarty version 2.6.31, created on 2024-05-15 20:09:01
         compiled from en/formfraisport.tpl */ ?>
<div id='pagefraisport'>
  <h2><span class="deco">></span>Step 4 - Delivery</h2>

  <?php if ($_SESSION['erreur_fraisport'] == 1): ?>
  <div id="erreur">
  <h3>Information missing! Some fields are incorrectly completed:</h3>
	Please select the transport required.<br />
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

      <?php if ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_fr): ?>Colissimo followed (2 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == courrier_ordinaire): ?>Ordinary postage (no monitoring)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_a): ?>Priority postal package (no monitoring, 8 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_b): ?>Priority postal package (no monitoring, 8 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_c): ?>Priority postal package (no monitoring, 10 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_prio_d): ?>Priority postal package (no monitoring, 10 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_b): ?>Second class postal package (no monitoring, 10 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_c): ?>Second class postal package (no monitoring, 12 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colispostal_eco_d): ?>Second class postal package (no monitoring, 15 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_int): ?>Colissimo followed for International (4 days)
      <?php elseif ($this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['mode'] == colissimo_dom): ?>Colissimo followed for French ovserseas departments(4 days)
      <?php endif; ?>
      - <strong><?php echo $this->_tpl_vars['frais_port'][$this->_sections['frais_port']['index']]['prix']; ?>
 €</strong><br />
    <?php endfor; endif; ?>
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>