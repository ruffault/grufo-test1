{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Fehlende Angaben</h2>
  <p>
    Nach Auskunft unseres Bankservices wurde keine Zahlung erhalten. 
    Ihre Bestellung-Nr. <strong>{$smarty.get.commande}</strong> kann aus diesem Grunde 
    leider nicht bearbeitet werden. 
  </p>
 
  <p>
    Wir stehen aber weiterhin gern zu Ihrer Verfügung. Wenn Sie Fragen haben, 
    wenden Sie sich bitte an <a href='{$urlsite}index.php?page=contact'>.</a>
  </p>
  <p>
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Katalogdurchsicht fortsetzen</a>
  </p>
</div>
{/if}
