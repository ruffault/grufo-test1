<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:37
         compiled from es/formsearch.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'es/formsearch.tpl', 23, false),)), $this); ?>
<div id="formsearch">

<?php if ($_GET['page'] != 'showpanier'): ?>
  <h2><span class="deco">></span> Búsqueda avanzada</h2>
<?php endif; ?>
<p>
Puede precisar su búsqueda mediante
uno o varios criterios.
</p>

<form method="get" action="index.php">
<fieldset>
<input type="hidden" name="page" value="showresult" />
<p class="field">
  <label>Título</label>
  <input type="text" name="search_titre" value="<?php echo $_SESSION['search_titre']; ?>
" />
</p>
<p class="field">
  <label>Categoría</label>
  <select name="search_categ">
    <option value=""></option>
    <?php unset($this->_sections['theme']);
$this->_sections['theme']['name'] = 'theme';
$this->_sections['theme']['loop'] = is_array($_loop=$this->_tpl_vars['theme']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['theme']['show'] = true;
$this->_sections['theme']['max'] = $this->_sections['theme']['loop'];
$this->_sections['theme']['step'] = 1;
$this->_sections['theme']['start'] = $this->_sections['theme']['step'] > 0 ? 0 : $this->_sections['theme']['loop']-1;
if ($this->_sections['theme']['show']) {
    $this->_sections['theme']['total'] = $this->_sections['theme']['loop'];
    if ($this->_sections['theme']['total'] == 0)
        $this->_sections['theme']['show'] = false;
} else
    $this->_sections['theme']['total'] = 0;
if ($this->_sections['theme']['show']):

            for ($this->_sections['theme']['index'] = $this->_sections['theme']['start'], $this->_sections['theme']['iteration'] = 1;
                 $this->_sections['theme']['iteration'] <= $this->_sections['theme']['total'];
                 $this->_sections['theme']['index'] += $this->_sections['theme']['step'], $this->_sections['theme']['iteration']++):
$this->_sections['theme']['rownum'] = $this->_sections['theme']['iteration'];
$this->_sections['theme']['index_prev'] = $this->_sections['theme']['index'] - $this->_sections['theme']['step'];
$this->_sections['theme']['index_next'] = $this->_sections['theme']['index'] + $this->_sections['theme']['step'];
$this->_sections['theme']['first']      = ($this->_sections['theme']['iteration'] == 1);
$this->_sections['theme']['last']       = ($this->_sections['theme']['iteration'] == $this->_sections['theme']['total']);
?>
      <option value="<?php echo $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['id_categorie']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_sections['theme']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</option>
    <?php endfor; endif; ?>
  </select>
</p>
<p class="field">
  <label>Autor</label>
  <input type="text" name="search_auteur" value="<?php echo $_SESSION['search_auteur']; ?>
"" />
</p>
<p class="field">
  <label>Idioma</label>
  <input type="text" name="search_lang" value="<?php echo $_SESSION['search_lang']; ?>
" />
</p>
<p class="field">
  <input type="submit" value="Buscar" name="search_submit" />
</p>
</fieldset>
</form>
</div>