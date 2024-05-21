<?php /* Smarty version 2.6.31, created on 2019-12-31 06:58:19
         compiled from es/oldcommande.tpl */ ?>
<div id="oldcommande">
<?php if ($this->_tpl_vars['oldcommande']): ?>

<h2><span class="deco">></span>Consulte su pedido en directo.</h2>
<?php unset($this->_sections['oldcommande']);
$this->_sections['oldcommande']['name'] = 'oldcommande';
$this->_sections['oldcommande']['loop'] = is_array($_loop=$this->_tpl_vars['oldcommande']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['oldcommande']['show'] = true;
$this->_sections['oldcommande']['max'] = $this->_sections['oldcommande']['loop'];
$this->_sections['oldcommande']['step'] = 1;
$this->_sections['oldcommande']['start'] = $this->_sections['oldcommande']['step'] > 0 ? 0 : $this->_sections['oldcommande']['loop']-1;
if ($this->_sections['oldcommande']['show']) {
    $this->_sections['oldcommande']['total'] = $this->_sections['oldcommande']['loop'];
    if ($this->_sections['oldcommande']['total'] == 0)
        $this->_sections['oldcommande']['show'] = false;
} else
    $this->_sections['oldcommande']['total'] = 0;
if ($this->_sections['oldcommande']['show']):

            for ($this->_sections['oldcommande']['index'] = $this->_sections['oldcommande']['start'], $this->_sections['oldcommande']['iteration'] = 1;
                 $this->_sections['oldcommande']['iteration'] <= $this->_sections['oldcommande']['total'];
                 $this->_sections['oldcommande']['index'] += $this->_sections['oldcommande']['step'], $this->_sections['oldcommande']['iteration']++):
$this->_sections['oldcommande']['rownum'] = $this->_sections['oldcommande']['iteration'];
$this->_sections['oldcommande']['index_prev'] = $this->_sections['oldcommande']['index'] - $this->_sections['oldcommande']['step'];
$this->_sections['oldcommande']['index_next'] = $this->_sections['oldcommande']['index'] + $this->_sections['oldcommande']['step'];
$this->_sections['oldcommande']['first']      = ($this->_sections['oldcommande']['iteration'] == 1);
$this->_sections['oldcommande']['last']       = ($this->_sections['oldcommande']['iteration'] == $this->_sections['oldcommande']['total']);
?>
<div class="detailcmd">
  <h3><?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['date']; ?>
</h3>
 Pedido <strong><?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['code']; ?>
</strong> 
  (<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=detailcommande&amp;no=<?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['code']; ?>
'>Detalle del pedido</a>)
  <div class='statut'>
  <strong>
  <?php if ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 1): ?>
    En espera de pago
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 2): ?>
    Pedido rechazado
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 4 || $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 3): ?>
    Tratamiento de pedido en curso
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 5): ?>
    Listo para ser enviado
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 6): ?>
    Enviado
  <?php endif; ?>
  </strong>

  <div class="statutbar">
  <?php if ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 2): ?>
    <?php if ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['refus'] != ''): ?>
      <em>motif : <?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['refus']; ?>
</em>
    <?php endif; ?>
  <?php else: ?>
    <div class="bar<?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut']; ?>
"></div>
  <?php endif; ?>
  </div>
  </div>
</div>

<?php endfor; endif; ?>
<?php else: ?>
<h2><span class="deco">></span>Consulte el estado de sus pedidos en directo.</h2>
No tiene ningún tratamiento de pedido en curso.
<?php endif; ?>
</div>