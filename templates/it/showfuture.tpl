<div id="showfuture">
{if $future}
<h2><span class="deco">></span>Articoli conservati</h2>

<div id="decote">
  {section name=future loop=$future}
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <input type="image" name="remettrepanier" value="Aggiungi al carrello" src="{$urlsite}lang/{$applicationlang}/img/ajouterpanier.gif" alt="Metti nel carrello" />
    </form>
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <input type="image" name="supprimer" value="Elimina" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" alt="Elimina" />
    </form>
    <a href="{$urlsite}{$future[future].id_produit|product_link:$future[future].nom}">{$future[future].nom|utf8_encode}</a>
    {if $future[future].disponible == 1}
      disponibile
    {else}
      disponibile in {$future[future].delai_reapprovisionnement} giorni
    {/if}
    <br />
  {/section}
</div>
{/if}
</div>
