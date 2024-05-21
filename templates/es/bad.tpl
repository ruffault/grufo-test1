{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Falta de datos</h2>
  <p>
    Nuestro banco nos ha informado que su pago no ha podido efectuarse.
    Lamentamos comunicarle que su pedido
    con referencia <strong>{$smarty.get.commande}</strong> no será procesado.
  </p>
 
  <p>
    Estamos a su disposición. Para cualquier pregunta
    <a href='{$urlsite}index.php?page=contact'>no dude en ponerse en contacto con nosotros.</a>
  </p>
  <p>
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>Continuar la visita del catálogo</a>
  </p>
</div>
{/if}
