<?php /* Smarty version 2.6.31, created on 2020-01-18 18:38:45
         compiled from it/good.tpl */ ?>
<?php if ($_GET['commande']): ?>
<div class='paiement'>
  <h2><span class="deco">></span>Congratulazioni!</h2>
  <p>
    Il pagamento del tuo ordine è stato effettuato con carta di credito.
    Il tuo ordine, numero <strong><?php echo $_GET['commande']; ?>
</strong>,
    è stato registrato con successo dal nostro servizio.
  </p>
  <p>
    Ad ogni fase dell'evasione del tuo ordine riceverai
    un messaggio e-mail. Potrai seguire, passo dopo passo,  
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande'>lo stato di avanzamento del tuo ordine</a>.
    Siamo a tua completa disposizione per <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>qualsiasi domanda.</a>
  </p>

  <p>
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0'>Prosegui la visita del catalogo</a>
  </p>
</div>
<?php endif; ?>