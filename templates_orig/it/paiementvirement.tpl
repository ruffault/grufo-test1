<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Congratulazioni!</h2>
  <p>
  Il tuo ordine, numero <strong>{$smarty.get.commande}</strong>, è stato registrato con successo dal nostro
  servizio. Attendiamo il tuo bonifico bancario per procedere all'evasione 
  dell'ordine.<br /> Potrai seguire, passo dopo passo,
  <a href='{$urlsite}index.php?page=oldcommande'>lo stato del tuo ordine</a>.
  <br />Non esitare a <a href='{$urlsite}index.php?page=contact'>sottoporci le tue domande.</a>
  <br />
  <br />
  <a href='{$urlsite}dictionnaire-et-lexique-c0'>Torna al catalogo</a>
{else}
  <h2><span class="deco">></span>Pagamento tramite bonifico bancario</h2>
  Effettuare il pagamento è molto semplice.<br />
  - E' sufficiente effettuare un bonifico dell'ammontare di {$montant} € indicando le seguenti coordinate:
  <br />
  
  <address>
  <strong>Banque Populaire Val de France</strong><br />
  PALAISEAU<br />
  IBAN: FR76 1870 7000 2309 2211 5798 611<br />
  BIC: CCBPFRPPVER
  </address>
  Numero del tuo ordine: <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Il tuo ordine sarà evaso alla ricezione del bonifico.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Termina l'ordine" />
    </div>
  </form>
{/if}
</div>
