{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Gracias</h2>
  <p>
    La forma de pago que usted ha elegido es la tarjeta de crédito.
    Su pedido, con referencia <strong>{$smarty.get.commande}</strong>,
    ha sido registrado correctamente por nuestros servicios.
  </p>
  <p>
    Será informado por e-mail de cada una las etapas de tratamiento
    de su pedido. Puede seguir paso a paso  
    <a href='{$urlsite}index.php?page=oldcommande'>el procesado de su pedido</a>.
    Estamos a su disposición para <a href='{$urlsite}index.php?page=contact'>responder a cualquier pregunta.</a>
  </p>

  <p>
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>Continuar la visita del catálogo</a>
  </p>
</div>
{/if}
