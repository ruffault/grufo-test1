<div id="showfuture">
{if $future}
<h2><span class="deco">></span>Articles mis de coté</h2>

<div id="decote">
  {section name=future loop=$future}<br>
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <button>Ajouter au panier</button>
    </form>
    <form method="post" action="{$urlsite}remfrompanier.php">
      <input type="hidden" name="id" value="{$future[future].id_produit}" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <button>Supprimer</button>
    </form>
    <br/>
    <a href="{$urlsite}{$future[future].id_produit|product_link:$future[future].nom}">{$future[future].nom|utf8_encode}</a>
    {if $future[future].disponible == 1}
     <br/> disponible
    {else}
      <br/>disponible sous {$future[future].delai_reapprovisionnement} jours
    {/if}
    <br />
  {/section}
</div>
{/if}
</div>
