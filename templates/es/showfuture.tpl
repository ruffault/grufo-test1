<div id="showfuture">
{if $future}
<h2><span class="deco">></span>Artículos archivados</h2>

<div id="decote">
  {section name=future loop=$future}
    <form method="post" action="remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <input type="image" name="remettrepanier" value="Añadir a la cesta de la compra" src="{$urlsite}lang/{$applicationlang}/img/ajouterpanier.gif" alt="Poner a la cesta de la compra" />
    </form>
    <form method="post" action="remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <input type="image" name="supprimer" value="Suprimir" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" alt="Suprimir" />
    </form>
    <a href="{$urlsite}{$future[future].id_produit|product_link:$future[future].nom}">{$future[future].nom|utf8_encode}</a>
    {if $future[future].disponible == 1}
      disponible
    {else}
      disponible en {$future[future].delai_reapprovisionnement} días
    {/if}
    <br />
  {/section}
</div>
{/if}
</div>
