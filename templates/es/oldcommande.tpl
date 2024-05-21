<div id="oldcommande">
{if $oldcommande}

<h2><span class="deco">></span>Consulte su pedido en directo.</h2>
{section name=oldcommande loop=$oldcommande}
<div class="detailcmd">
  <h3>{$oldcommande[oldcommande].date}</h3>
 Pedido <strong>{$oldcommande[oldcommande].code}</strong> 
  (<a href='{$urlsite}index.php?page=detailcommande&amp;no={$oldcommande[oldcommande].code}'>Detalle del pedido</a>)
  <div class='statut'>
  <strong>
  {if $oldcommande[oldcommande].statut == 1}
    En espera de pago
  {elseif $oldcommande[oldcommande].statut == 2}
    Pedido rechazado
  {elseif $oldcommande[oldcommande].statut == 4 or $oldcommande[oldcommande].statut == 3}
    Tratamiento de pedido en curso
  {elseif $oldcommande[oldcommande].statut == 5}
    Listo para ser enviado
  {elseif $oldcommande[oldcommande].statut == 6}
    Enviado
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
<h2><span class="deco">></span>Consulte el estado de sus pedidos en directo.</h2>
No tiene ningún tratamiento de pedido en curso.
{/if}
</div>
