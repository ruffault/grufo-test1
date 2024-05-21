<div id="formsearch">

{if $smarty.get.page != "showpanier"}
  <h2><span class="deco">></span> Erweiterte Suche</h2>
{/if}
<p>
Durch Festlegung eines oder mehrerer Kriterien können Sie Ihre Suche genauer umreissen. 
</p>

<form method="get" action="{$urlsite}index.php">
<fieldset>
<input type="hidden" name="page" value="showresult" />
<p class="field">
  <label>Titel</label>
  <input type="text" name="search_titre" value="{$smarty.session.search_titre}" />
</p>
<p class="field">
  <label>Kategorie</label>
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
  <label>Sprache</label>
  <input type="text" name="search_lang" value="{$smarty.session.search_lang}" />
</p>
<p class="field">
  <input type="submit" value="Suchen" name="search_submit" />
</p>
</fieldset>
</form>
</div>
