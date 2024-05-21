<?php /* Smarty version 2.6.31, created on 2019-11-19 19:21:48
         compiled from en/oldcommande.tpl */ ?>
<div id="oldcommande">
<?php if ($this->_tpl_vars['oldcommande']): ?>

<h2><span class="deco">></span>Real-time order follow-up.</h2>
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
  Order <strong><?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['code']; ?>
</strong> 
  (<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=detailcommande&amp;no=<?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['code']; ?>
'>Order details</a>)
  <div class='statut'>
  <strong>
  <?php if ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 1): ?>
    Awaiting payment 
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 2): ?>
    Order refused
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 4 || $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 3): ?>
    Order being validated
    <p>You will receive an email when validation. </p>
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 5): ?>
    Command being processed.
    <p style="color:red">You will receive an email when shipped.</p>
  <?php elseif ($this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['statut'] == 6): ?>
    <p>Shipped on <?php echo $this->_tpl_vars['oldcommande'][$this->_sections['oldcommande']['index']]['date_envoie']; ?>
</p>
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
<h2><span class="deco">></span>Real-time order follow-up.</h2>
You have no orders in progress.
<?php endif; ?>
</div>