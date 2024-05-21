{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Herzlichen Glückwunsch</h2>
  <p>
    Sie haben Ihre Bestellung per Kreditkarte bezahlt. 
    Ihre Bestellung-Nr. <strong>{$smarty.get.commande}</strong> wurde entgegengenommen.
      </p>
  <p>
    Sie werden über jeden Schritt der Bestellungsabwicklung per E-Mail benachrichtigt. 
    So können Sie Schritt für Schritt 
    <a href='{$urlsite}index.php?page=oldcommande'>den Bearbeitungsstand Ihrer Bestellung verfolgen</a>.
    Für Fragen über die Bearbeitung Ihrer Bestellungen stehen wir Ihnen gern zur Vefügung <a href='{$urlsite}index.php?page=contact'>.</a>
  </p>

  <p>
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Katalogdurchsicht fortsetzen</a>
  </p>
</div>
{/if}