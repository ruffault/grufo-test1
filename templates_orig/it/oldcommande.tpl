<div id="oldcommande">
{if $oldcommande}

<h2><span class="deco">></span>Segui i tuoi ordini online.</h2>
{section name=oldcommande loop=$oldcommande}
<div class="detailcmd">
  <h3>{$oldcommande[oldcommande].date}</h3>
  Ordine <strong>{$oldcommande[oldcommande].code}</strong> 
  (<a href='{$urlsite}index.php?page=detailcommande&amp;no={$oldcommande[oldcommande].code}'>Dettaglio dell'ordine</a>)
  <div class='statut'>
  <strong>
  {if $oldcommande[oldcommande].statut == 1}
    In attesa di pagamento
  {elseif $oldcommande[oldcommande].statut == 2}
    Ordine rifiutato
  {elseif $oldcommande[oldcommande].statut == 4 or $oldcommande[oldcommande].statut == 3}
    In corso di evasione
  {elseif $oldcommande[oldcommande].statut == 5}
    Pronto per la spedizione
  {elseif $oldcommande[oldcommande].statut == 6}
    Spedito
  {/if}
  </strong>

  <div class="statutbar">
  {if $oldcommande[oldcommande].statut == 2}
    {if $oldcommande[oldcommande].refus != ''}
      <em>motivo: {$oldcommande[oldcommande].refus}</em>
    {/if}
  {else}
    <div class="bar{$oldcommande[oldcommande].statut}"></div>
  {/if}
  </div>
  </div>
</div>

{/section}
{else}
<h2><span class="deco">></span>Segui i tuoi ordini online.</h2>
Non risultano ancora tuoi ordini in corso di evasione.
{/if}
</div>
