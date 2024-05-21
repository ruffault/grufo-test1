<div id="showfuture">
{if $future}
<h2><span class="deco">></span>Stored items</h2>

<div id="decote">
  {section name=future loop=$future}
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <input type="image" name="remettrepanier" value="Add to basket" src="{$urlsite}lang/{$applicationlang}/img/ajouterpanier.gif" alt="Add to basket" />
    </form>
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <input type="image" name="supprimer" value="Delete" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" alt="Delete" />
    </form>
    <a href="{$urlsite}{$future[future].id_produit|product_link:$future[future].nom}">{$future[future].nom|utf8_encode}</a>
    {if $future[future].disponible == 1}
      available
    {else}
      available in {$future[future].delai_reapprovisionnement} days
    {/if}
    <br />
  {/section}
</div>
{/if}
</div>
