<?php /* Smarty version 2.6.31, created on 2024-05-16 10:11:45
         compiled from fr/messages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'fr/messages.tpl', 9, false),array('modifier', 'utf8_encode', 'fr/messages.tpl', 10, false),array('modifier', 'nl2br', 'fr/messages.tpl', 13, false),)), $this); ?>
﻿






<?php unset($this->_sections['messages']);
$this->_sections['messages']['name'] = 'messages';
$this->_sections['messages']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['messages']['show'] = true;
$this->_sections['messages']['max'] = $this->_sections['messages']['loop'];
$this->_sections['messages']['step'] = 1;
$this->_sections['messages']['start'] = $this->_sections['messages']['step'] > 0 ? 0 : $this->_sections['messages']['loop']-1;
if ($this->_sections['messages']['show']) {
    $this->_sections['messages']['total'] = $this->_sections['messages']['loop'];
    if ($this->_sections['messages']['total'] == 0)
        $this->_sections['messages']['show'] = false;
} else
    $this->_sections['messages']['total'] = 0;
if ($this->_sections['messages']['show']):

            for ($this->_sections['messages']['index'] = $this->_sections['messages']['start'], $this->_sections['messages']['iteration'] = 1;
                 $this->_sections['messages']['iteration'] <= $this->_sections['messages']['total'];
                 $this->_sections['messages']['index'] += $this->_sections['messages']['step'], $this->_sections['messages']['iteration']++):
$this->_sections['messages']['rownum'] = $this->_sections['messages']['iteration'];
$this->_sections['messages']['index_prev'] = $this->_sections['messages']['index'] - $this->_sections['messages']['step'];
$this->_sections['messages']['index_next'] = $this->_sections['messages']['index'] + $this->_sections['messages']['step'];
$this->_sections['messages']['first']      = ($this->_sections['messages']['iteration'] == 1);
$this->_sections['messages']['last']       = ($this->_sections['messages']['iteration'] == $this->_sections['messages']['total']);
?>
<?php echo smarty_function_cycle(array('values' => "<table id='messages' width='95%'><tr><td class='titre'>",'name' => 'titremessage'), $this);?>

  <span>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['TITRE_MSG'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</span>
  <br />
<?php echo smarty_function_cycle(array('values' => "<tr><td class='contenu'>",'name' => 'titremessage'), $this);?>

	<span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['CONTENU_MSG'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php echo smarty_function_cycle(array('values' => "</td></tr>"), $this);?>
	
<?php echo smarty_function_cycle(array('values' => "</td></tr></table><br />"), $this);?>

<?php endfor; endif; ?>


