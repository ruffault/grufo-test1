<div id="oldcommande">
{if $oldcommande}

<h2><span class="deco">></span>Verfolgen Sie Ihre Bestellungen online.</h2>
{section name=oldcommande loop=$oldcommande}
<div class="detailcmd">
  <h3>{$oldcommande[oldcommande].date}</h3>
  Bestellung <strong>{$oldcommande[oldcommande].code}</strong> 
  (<a href='{$urlsite}index.php?page=detailcommande&amp;no={$oldcommande[oldcommande].code}'>Bestellungsdetail</a>)
  <div class='statut'>
  <strong>
  {if $oldcommande[oldcommande].statut == 1}
    Noch nicht bezahlt
  {elseif $oldcommande[oldcommande].statut == 2}
    Bestellung abgelehnt
  {elseif $oldcommande[oldcommande].statut == 4 or $oldcommande[oldcommande].statut == 3}
    In Bearbeitung
  {elseif $oldcommande[oldcommande].statut == 5}
    Versandfertig
  {elseif $oldcommande[oldcommande].statut == 6}
    Verschickt
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
<h2><span class="deco">></span>Verfolgen Sie Ihre Bestellungen online.</h2>
Sie haben derzeit keine Bestellung in Bearbeitung. 
{/if}
</div>
