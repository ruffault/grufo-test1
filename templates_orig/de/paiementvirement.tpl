<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Herzlichen Glückwunsch</h2>
  <p>
  Wir haben Ihre Bestellung mit der Nr. <strong>{$smarty.get.commande}</strong> 
  registriert. Sobald wir Ihre Scheckzahlung erhalten haben, leiten wir die Bearbeitung
  Ihrer Bestellung in die Wege.<br /> Sie können die Bearbeitung Ihrer Bestellung 
  Schritt für Schritt <a href='{$urlsite}index.php?page=oldcommande'>verfolgen</a>.
  <br />Ihre diesbezüglichen Fragen <a href='{$urlsite}index.php?page=contact'>beantworten
  wir gern.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Zum Katalog zurück</a>
{else}
  <h2><span class="deco">></span>Zahlung per Überweisung</h2>
  Per Überweisung zahlen geht ganz einfach. <br />
  - Stellen Sie eine Überweisung in Höhe von {$montant} € auf folgenden Empfänger 
  aus:
  <br />
  
  <address>
  <strong>Banque Populaire Val de France</strong><br />
  PALAISEAU<br />
  IBAN : FR76 1870 7000 2309 2211 5798 611<br />
  BIC : CCBPFRPPVER
  </address>
  Bestellung Nr.: <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Sobald wir Ihre Überweisung erhalten haben, wird die Bearbeitung Ihrer 
  Bestellung in die Wege geleitet.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Bestellung abschließen" />
    </div>
  </form>
{/if}
</div>
