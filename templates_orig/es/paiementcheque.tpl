<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>¡Felicidades!</h2>
  <p>
  El pedido con referencia <strong>{$smarty.get.commande}</strong> ha sido registrado correctamente por nuestros
  servicios. Para seguir el procesamiento del pedido debe realizar la transferencia 
  bancaria. Para seguir el procesamiento del pedido debe realizar la transferencia 
  bancaria.<br /> Puede seguir, paso a paso,
  <a href='{$urlsite}index.php?page=oldcommande'>el procesamiento de su pedido</a>.
  <br />No dude en hacernos cualquier <a href='{$urlsite}index.php?page=contact'>consulta.</a>
  <br />
  <br />
  <a href='{$urlsite}dictionnaire-et-lexique-c0'>Volver al catálogo</a>
{else}
  <h2><span class="deco">></span>Pago con cheque</h2>
  Pagar con cheque es muy simple:<br />
  - Debe enviar un cheque de {$montant} € a la orden de la Maison du
  dictionnaire, a la dirección:<br />
  <address>
  <strong>La Maison du Dictionnaire</strong><br />
  98 bd du Montparnasse<br />
  F-75014 París Francia<br />
  </address>
  - Debe indicar la referencia de su pedido detrás del cheque. Debe tener en cuenta que: <br />
  <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Su pedido será tratado a partir de la recepción de su cheque.<br /><br />
  </p>
  <form method="post" action="validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminar el pedido" />
    </div>
  </form>
{/if}
</div>
