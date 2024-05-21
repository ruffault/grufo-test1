<div id="oldcommande">
{if $oldcommande}

<h2><span class="deco">></span>Suivez vos commandes en direct.</h2>
{section name=oldcommande loop=$oldcommande}
<div class="detailcmd">
  <h3>{$oldcommande[oldcommande].date|utf8_encode}</h3>
  Commande <strong>{$oldcommande[oldcommande].code}</strong>
  (<a href='{$urlsite}index.php?page=detailcommande&amp;no={$oldcommande[oldcommande].code}'>Détail de la commande</a>)
  <div class='statut'>
  <strong>
  {if $oldcommande[oldcommande].statut == 1}
    En attente de règlement
  {elseif $oldcommande[oldcommande].statut == 2}
    Commande refusée
  {elseif $oldcommande[oldcommande].statut == 4 or $oldcommande[oldcommande].statut == 3}
    En cours de validation
    <p>Vous recevrez un courriel lors de sa validation. </p>
  {elseif $oldcommande[oldcommande].statut == 5}
    En cours de traitement
    <p style="color:red">Vous recevrez un courriel lors de son expédition. </p>
  {elseif $oldcommande[oldcommande].statut == 6}
    <p>Expédié le {$oldcommande[oldcommande].date_envoie}</p>
  {/if}
  </strong>

  <div class="statutbar">
  {if $oldcommande[oldcommande].statut == 2}
    {if $oldcommande[oldcommande].refus != ''}
      <em>motif : {$oldcommande[oldcommande].refus}</em>
    {/if}
  {else}
    <div class="bar{$oldcommande[oldcommande].statut}"></div>
  {/if}
  </div>
  </div>
</div>

{/section}
{else}
<h2><span class="deco">></span>Suivez vos commandes en direct.</h2>
Vous n'avez pas encore de commande en cours de traitement.
{/if}
</div>
