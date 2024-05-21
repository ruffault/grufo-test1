<?php /* Smarty version 2.6.31, created on 2024-05-17 00:15:49
         compiled from fr/usercomment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'fr/usercomment.tpl', 15, false),array('modifier', 'escape', 'fr/usercomment.tpl', 15, false),array('modifier', 'nl2br', 'fr/usercomment.tpl', 15, false),)), $this); ?>
<div id="comment">
<h4><span class="deco">&gt;</span>Commentaires</h4>
<?php if ($_SESSION['id_membre']): ?>
	<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=addcomment&amp;id=<?php echo $_GET['id']; ?>
'>
		Votre avis nous intéresse. Rédigez un commentaire.
	</a><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['remarks']): ?>
	<div id="usercomment">
		<?php unset($this->_sections['remarks']);
$this->_sections['remarks']['name'] = 'remarks';
$this->_sections['remarks']['loop'] = is_array($_loop=$this->_tpl_vars['remarks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['remarks']['show'] = true;
$this->_sections['remarks']['max'] = $this->_sections['remarks']['loop'];
$this->_sections['remarks']['step'] = 1;
$this->_sections['remarks']['start'] = $this->_sections['remarks']['step'] > 0 ? 0 : $this->_sections['remarks']['loop']-1;
if ($this->_sections['remarks']['show']) {
    $this->_sections['remarks']['total'] = $this->_sections['remarks']['loop'];
    if ($this->_sections['remarks']['total'] == 0)
        $this->_sections['remarks']['show'] = false;
} else
    $this->_sections['remarks']['total'] = 0;
if ($this->_sections['remarks']['show']):

            for ($this->_sections['remarks']['index'] = $this->_sections['remarks']['start'], $this->_sections['remarks']['iteration'] = 1;
                 $this->_sections['remarks']['iteration'] <= $this->_sections['remarks']['total'];
                 $this->_sections['remarks']['index'] += $this->_sections['remarks']['step'], $this->_sections['remarks']['iteration']++):
$this->_sections['remarks']['rownum'] = $this->_sections['remarks']['iteration'];
$this->_sections['remarks']['index_prev'] = $this->_sections['remarks']['index'] - $this->_sections['remarks']['step'];
$this->_sections['remarks']['index_next'] = $this->_sections['remarks']['index'] + $this->_sections['remarks']['step'];
$this->_sections['remarks']['first']      = ($this->_sections['remarks']['iteration'] == 1);
$this->_sections['remarks']['last']       = ($this->_sections['remarks']['iteration'] == $this->_sections['remarks']['total']);
?>
			<p>
				<span>Commentaire de <em><?php echo $this->_tpl_vars['remarks'][$this->_sections['remarks']['index']]['login']; ?>
</em>
				le <?php echo $this->_tpl_vars['remarks'][$this->_sections['remarks']['index']]['date']; ?>
</span>
				<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['remarks'][$this->_sections['remarks']['index']]['remarks'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : utf8_decode($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

			</p>
		<?php endfor; endif; ?>
	</div>
<?php else: ?>
	Aucun commentaire n'est encore disponible pour cet article.<br />
<?php endif; ?>
</div>