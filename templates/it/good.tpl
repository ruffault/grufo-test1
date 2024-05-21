{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Congratulazioni!</h2>
  <p>
    Il pagamento del tuo ordine è stato effettuato con carta di credito.
    Il tuo ordine, numero <strong>{$smarty.get.commande}</strong>,
    è stato registrato con successo dal nostro servizio.
  </p>
  <p>
    Ad ogni fase dell'evasione del tuo ordine riceverai
    un messaggio e-mail. Potrai seguire, passo dopo passo,  
    <a href='{$urlsite}index.php?page=oldcommande'>lo stato di avanzamento del tuo ordine</a>.
    Siamo a tua completa disposizione per <a href='{$urlsite}index.php?page=contact'>qualsiasi domanda.</a>
  </p>

  <p>
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>Prosegui la visita del catalogo</a>
  </p>
</div>
{/if}
