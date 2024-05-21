<?php /* Smarty version 2.6.31, created on 2024-05-17 12:13:13
         compiled from fr/col_catedit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'fr/col_catedit.tpl', 6, false),)), $this); ?>
<script type="text/javascript" src="js/filter.js"></script>
	<h3>Filtrer par catégorie</h3>
		<ul class="border">
			<li><a href="#" id="allcat" class="current">Tout afficher</a></li>				
        	<?php unset($this->_sections['test']);
$this->_sections['test']['name'] = 'test';
$this->_sections['test']['loop'] = is_array($_loop=$this->_tpl_vars['test']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['test']['show'] = true;
$this->_sections['test']['max'] = $this->_sections['test']['loop'];
$this->_sections['test']['step'] = 1;
$this->_sections['test']['start'] = $this->_sections['test']['step'] > 0 ? 0 : $this->_sections['test']['loop']-1;
if ($this->_sections['test']['show']) {
    $this->_sections['test']['total'] = $this->_sections['test']['loop'];
    if ($this->_sections['test']['total'] == 0)
        $this->_sections['test']['show'] = false;
} else
    $this->_sections['test']['total'] = 0;
if ($this->_sections['test']['show']):

            for ($this->_sections['test']['index'] = $this->_sections['test']['start'], $this->_sections['test']['iteration'] = 1;
                 $this->_sections['test']['iteration'] <= $this->_sections['test']['total'];
                 $this->_sections['test']['index'] += $this->_sections['test']['step'], $this->_sections['test']['iteration']++):
$this->_sections['test']['rownum'] = $this->_sections['test']['iteration'];
$this->_sections['test']['index_prev'] = $this->_sections['test']['index'] - $this->_sections['test']['step'];
$this->_sections['test']['index_next'] = $this->_sections['test']['index'] + $this->_sections['test']['step'];
$this->_sections['test']['first']      = ($this->_sections['test']['iteration'] == 1);
$this->_sections['test']['last']       = ($this->_sections['test']['iteration'] == $this->_sections['test']['total']);
?>
        	<li><a href="#" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['test'][$this->_sections['test']['index']]['id_categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" class="filter"><?php echo ((is_array($_tmp=$this->_tpl_vars['test'][$this->_sections['test']['index']]['categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></li>
        	<?php endfor; endif; ?>
        </ul>
			
				
				