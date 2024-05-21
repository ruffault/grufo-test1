<?php /* Smarty version 2.6.31, created on 2019-11-17 15:02:49
         compiled from it/contact.tpl */ ?>
<div id="contact">
<h2><span class="deco">></span>Contattaci</h2>
<?php if ($_GET['statut'] == 'fail'): ?>
        <strong>E' sufficiente comunicarci il tuo indirizzo e-mail e scrivere un messaggio</strong>
<?php endif; ?>
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANCE<br /><br />
Tel.: +33 (0) 1 43 22 12 93<br />
Fax: +33 (0) 1 43 22 01 77<br /><br />
Dal lunedì al venerdì dalle ore 10.00 alle ore 18.00 e il
sabato dalle ore 14.00 alle ore 18.00 (ora di Parigi)<br /><br />
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

<?php if ($_GET['statut'] == 'ok'): ?>
        <strong>Il tuo messaggio è stato ricevuto. Ti ringraziamo per averci scritto. 
        Risponderemo nel più breve tempo possibile.</strong>
<?php else: ?>
  <h2><span class="deco">></span>Domande online</h2>
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
question.php">
    <p>
      <label>Il tuo indirizzo e-mail</label><input type="text" name="email"
      value="<?php if (isset ( $_SESSION['email'] )): ?><?php echo $_SESSION['email']; ?>
<?php endif; ?>" />
      <br />
      <label>Messaggio</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Invio" />
    </p>
  </form>
<?php endif; ?>
</div>