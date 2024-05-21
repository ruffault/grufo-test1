<div id="oldcommande">
{if $oldcommande}

<h2><span class="deco">></span>Real-time order follow-up.</h2>
{section name=oldcommande loop=$oldcommande}
<div class="detailcmd">
  <h3>{$oldcommande[oldcommande].date}</h3>
  Order <strong>{$oldcommande[oldcommande].code}</strong> 
  (<a href='{$urlsite}index.php?page=detailcommande&amp;no={$oldcommande[oldcommande].code}'>Order details</a>)
  <div class='statut'>
  <strong>
  {if $oldcommande[oldcommande].statut == 1}
    Awaiting payment 
  {elseif $oldcommande[oldcommande].statut == 2}
    Order refused
  {elseif $oldcommande[oldcommande].statut == 4 or $oldcommande[oldcommande].statut == 3}
    Order being validated
    <p>You will receive an email when validation. </p>
  {elseif $oldcommande[oldcommande].statut == 5}
    Command being processed.
    <p style="color:red">You will receive an email when shipped.</p>
  {elseif $oldcommande[oldcommande].statut == 6}
    <p>Shipped on {$oldcommande[oldcommande].date_envoie}</p>
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
<h2><span class="deco">></span>Real-time order follow-up.</h2>
You have no orders in progress.
{/if}
</div>
