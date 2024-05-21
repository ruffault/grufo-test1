<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Congratulazioni!</h2>
  <p>
  Il tuo ordine, numero <strong>{$smarty.get.commande}</strong>, è stato registrato con successo dal nostro 
  servizio. Attendiamo la ricezione del tuo assegno per procedere all'evasione 
  dell'ordine.<br /> Potrai seguire, passo dopo passo, 
  <a href='{$urlsite}index.php?page=oldcommande'>lo stato del tuo ordine</a>.
  <br />Non esitare a <a href='{$urlsite}index.php?page=contact'>sottoporci le tue domande.</a>
  <br />
  <br />
  <a href='{$urlsite}dictionnaire-et-lexique-c0'>Torna al catalogo</a>
{else}
  <h2><span class="deco">></span>Pagamento tramite assegno</h2>
  Effettuare il pagamento tramite assegno è molto semplice:<br />
  - E' sufficiente inviare un assegno dell'ammontare di {$montant} € all'ordine di La Maison du
  dictionnaire all'indirizzo:<br />
  <address>
  <strong>La Maison du Dictionnaire</strong><br />
  98 bd du Montparnasse<br />
  F-75014 Paris France<br />
  </address>
  - E' necessario precisare il numero del tuo ordine sul retro dell'assegno, ossia: <br />
  <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Il tuo ordine sarà evaso alla ricezione del pagamento.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Termina l'ordine" />
    </div>
  </form>
{/if}
</div>
