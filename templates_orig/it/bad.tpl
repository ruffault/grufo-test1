{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Informazioni mancanti</h2>
  <p>
    Il nostro servizio bancario ci ha comunicato che il pagamento non è andato a buon fine.
    Di conseguenza, siamo spiacenti di doverti informare che il tuo ordine,
    numero <strong>{$smarty.get.commande}</strong> non potrà essere evaso.
  </p>
 
  <p>
    Restiamo comunque a tua completa disposizione per  
    <a href='{$urlsite}index.php?page=contact'>qualsiasi domanda.</a>
  </p>
  <p>
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>Prosegui la visita del catalogo</a>
  </p>
</div>
{/if}
