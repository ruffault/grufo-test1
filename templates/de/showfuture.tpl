<div id="showfuture">
{if $future}
<h2><span class="deco">></span>Beiseite gelegte Artikel</h2>

<div id="decote">
  {section name=future loop=$future}
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <input type="image" name="remettrepanier" value="In den Warenkorb" src="{$urlsite}lang/{$applicationlang}/img/ajouterpanier.gif" alt="In den Warenkorb" />
    </form>
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <input type="image" name="supprimer" value="Löschen" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" alt="Löschen" />
    </form>
    <a href="{$urlsite}{$future[future].id_produit|product_link:$future[future].nom}">{$future[future].nom|utf8_encode}</a>
    {if $future[future].disponible == 1}
      lieferbar
    {else}
      lieferbar binnen {$future[future].delai_reapprovisionnement} Tagen
    {/if}
    <br />
  {/section}
</div>
{/if}
</div>
