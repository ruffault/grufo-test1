<div id="formsearch">

{if $smarty.get.page != "showpanier"}
  <h2><span class="deco">></span> Advanced search</h2>
{/if}
<p>
You can refine your search by specifying
one or more criteria.
</p>

<form method="get" action="{$urlsite}index.php">
<fieldset>
<input type="hidden" name="page" value="showresult" />
<p class="field">
  <label>Title</label>
  <input type="text" name="search_titre" value="{$smarty.session.search_titre}" />
</p>
<p class="field">
  <label>Category</label>
  <select name="search_categ">
    <option value=""></option>
    {section name=theme loop=$theme}
      <option value="{$theme[theme].id_categorie}">{$theme[theme].nom|utf8_encode}</option>
    {/section}
  </select>
</p>
<p class="field">
  <label>Author</label>
  <input type="text" name="search_auteur" value="{$smarty.session.search_auteur}"" />
</p>
<p class="field">
  <label>Language</label>
  <input type="text" name="search_lang" value="{$smarty.session.search_lang}" />
</p>
<p class="field">
  <input type="submit" value="Search" name="search_submit" />
</p>
</fieldset>
</form>
</div>