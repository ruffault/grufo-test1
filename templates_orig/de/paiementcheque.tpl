<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Herzlichen Glückwunsch</h2>
  <p>
  Wir haben Ihre Bestellung Nr. <strong>{$smarty.get.commande}</strong> 
  registriert. Sobald wir Ihre Scheckzahlung erhalten haben, wird die Bearbeitung 
  Ihrer Bestellung in die Wege geleitet. 
  <br /> Sie können die Bearbeitung Ihrer Bestellung Schritt für Schritt 
  <a href='{$urlsite}index.php?page=oldcommande'>verfolgen</a>.
  <br />Ihre diesbezüglichen Fragen <a href='{$urlsite}index.php?page=contact'>beantworten 
  wir gern.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Zum Katalog zurück</a>
{else}
  <h2><span class="deco">></span>Scheckzahlung</h2>
  So einfach geht die Scheckzahlung:<br />
  - Schicken Sie einen auf die Fachbuchhandlung La Maison du
  dictionnaire ausgestellten Scheck in Höhe von {$montant} €  an folgende Adresse:<br />
  <address>
  <strong>La Maison du Dictionnaire</strong><br />
  98 bd du Montparnasse<br />
  F-75014 Paris, Frankreich<br />
  </address>
  - Geben Sie rückseitig die Bestellungs-Nr., also <br />
  <strong>{$smarty.session.code_cmd}</strong><br />an.
  <br />
  Sobald wir Ihre Scheckzahlung erhalten haben, leiten wir die Bearbeitung 
  Ihrer Bestellung in die Wege. <br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Bestellung abschließen" />
    </div>
  </form>
{/if}
</div>
