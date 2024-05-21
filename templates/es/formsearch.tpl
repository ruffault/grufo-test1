<div id="formsearch">

{if $smarty.get.page != "showpanier"}
  <h2><span class="deco">></span> Búsqueda avanzada</h2>
{/if}
<p>
Puede precisar su búsqueda mediante
uno o varios criterios.
</p>

<form method="get" action="index.php">
<fieldset>
<input type="hidden" name="page" value="showresult" />
<p class="field">
  <label>Título</label>
  <input type="text" name="search_titre" value="{$smarty.session.search_titre}" />
</p>
<p class="field">
  <label>Categoría</label>
  <select name="search_categ">
    <option value=""></option>
    {section name=theme loop=$theme}
      <option value="{$theme[theme].id_categorie}">{$theme[theme].nom|utf8_encode}</option>
    {/section}
  </select>
</p>
<p class="field">
  <label>Autor</label>
  <input type="text" name="search_auteur" value="{$smarty.session.search_auteur}"" />
</p>
<p class="field">
  <label>Idioma</label>
  <input type="text" name="search_lang" value="{$smarty.session.search_lang}" />
</p>
<p class="field">
  <input type="submit" value="Buscar" name="search_submit" />
</p>
</fieldset>
</form>
</div>
