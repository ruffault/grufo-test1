<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>¡Felicidades!</h2>
  <p>
  El pedido con referencia <strong>{$smarty.get.commande}</strong> ha sido registrado correctamente por nuestros
  servicios. Para seguir el procesamiento del pedido debe realizar la transferencia 
  bancaria.<br /> Puede seguir, paso a paso,
  <a href='{$urlsite}index.php?page=oldcommande'>el procesamiento de su pedido</a>.
  <br />No dude en hacernos cualquier <a href='{$urlsite}index.php?page=contact'>consulta.</a>
  <br />
  <br />
  <a href='{$urlsite}dictionnaire-et-lexique-c0'>Volver al catálogo</a>
{else}
  <h2><span class="deco">></span>Pago con transferencia bancaria</h2>
  Realizar un pago es muy simple.<br />
  - Debe realizar una transferencia de {$montant} € con los datos siguientes:
  <br />
  
  <address>
  <strong>Banque Populaire Val de France</strong><br />
  PALAISEAU<br />
  IBAN : FR76 1870 7000 2309 2211 5798 611<br />
  BIC : CCBPFRPPVER
  </address>
  Referencia de su pedido: <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Su pedido será tratado a partir de la recepción de su trasnferencia.<br /><br />
  </p>
  <form method="post" action="validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminar el pedido" />
    </div>
  </form>
{/if}
</div>
