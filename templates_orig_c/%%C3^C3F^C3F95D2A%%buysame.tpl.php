<?php /* Smarty version 2.6.31, created on 2019-10-30 01:12:24
         compiled from fr/buysame.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'fr/buysame.tpl', 4, false),array('modifier', 'product_link', 'fr/buysame.tpl', 9, false),array('modifier', 'htmlentities', 'fr/buysame.tpl', 9, false),array('modifier', 'lower', 'fr/buysame.tpl', 9, false),array('modifier', 'capitalize', 'fr/buysame.tpl', 9, false),)), $this); ?>
<div id="buysame_all">
<?php if (isset ( $this->_tpl_vars['tab_same'] )): ?>
<h4><span class="deco">&gt;</span>Les internautes ayant acheté
	<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
 ont aussi acheté :</h4>
<div>	
	<ul id="buysame">
		<?php unset($this->_sections['tab_same']);
$this->_sections['tab_same']['name'] = 'tab_same';
$this->_sections['tab_same']['loop'] = is_array($_loop=$this->_tpl_vars['tab_same']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tab_same']['show'] = true;
$this->_sections['tab_same']['max'] = $this->_sections['tab_same']['loop'];
$this->_sections['tab_same']['step'] = 1;
$this->_sections['tab_same']['start'] = $this->_sections['tab_same']['step'] > 0 ? 0 : $this->_sections['tab_same']['loop']-1;
if ($this->_sections['tab_same']['show']) {
    $this->_sections['tab_same']['total'] = $this->_sections['tab_same']['loop'];
    if ($this->_sections['tab_same']['total'] == 0)
        $this->_sections['tab_same']['show'] = false;
} else
    $this->_sections['tab_same']['total'] = 0;
if ($this->_sections['tab_same']['show']):

            for ($this->_sections['tab_same']['index'] = $this->_sections['tab_same']['start'], $this->_sections['tab_same']['iteration'] = 1;
                 $this->_sections['tab_same']['iteration'] <= $this->_sections['tab_same']['total'];
                 $this->_sections['tab_same']['index'] += $this->_sections['tab_same']['step'], $this->_sections['tab_same']['iteration']++):
$this->_sections['tab_same']['rownum'] = $this->_sections['tab_same']['iteration'];
$this->_sections['tab_same']['index_prev'] = $this->_sections['tab_same']['index'] - $this->_sections['tab_same']['step'];
$this->_sections['tab_same']['index_next'] = $this->_sections['tab_same']['index'] + $this->_sections['tab_same']['step'];
$this->_sections['tab_same']['first']      = ($this->_sections['tab_same']['iteration'] == 1);
$this->_sections['tab_same']['last']       = ($this->_sections['tab_same']['iteration'] == $this->_sections['tab_same']['total']);
?>
			<li>	
				<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tab_same'][$this->_sections['tab_same']['index']]['id'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['tab_same'][$this->_sections['tab_same']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['tab_same'][$this->_sections['tab_same']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tab_same'][$this->_sections['tab_same']['index']]['nom'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a> de <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tab_same'][$this->_sections['tab_same']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

			</li>
		<?php endfor; endif; ?>
	</ul>
</div>
<?php endif; ?>
</div>