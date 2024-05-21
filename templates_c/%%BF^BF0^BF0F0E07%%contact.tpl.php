<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:24
         compiled from de/contact.tpl */ ?>
<div id="contact">
<h2><span class="deco">></span>Kontakt</h2>
<?php if ($_GET['statut'] == 'fail'): ?>
        <strong>Teilen Sie uns Ihre E-Mail-Adresse mit und schicken Sie uns eine Nachricht</strong>
<?php endif; ?>
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANKREICH<br /><br />
Tel. +33 (0) 1 43 22 12 93<br />
Fax +33 (0) 1 43 22 01 77<br /><br />
Montags bis freitags von 10:00 bis 18:00 Uhr,
samstags von 14:00 bis 18:00 Uhr (Ortszeit)<br /><br />
E-Mail: 
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

<?php if ($_GET['statut'] == 'ok'): ?>
        <strong>Vielen Dank für Ihre Nachricht.  
        Wir bearbeiten Ihre Anfrage so schnell wie möglich.</strong>
<?php else: ?>
  <h2><span class="deco">></span>Online-Anfrage</h2>
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
question.php">
    <p>
      <label>Ihre E-Mail</label><input type="text" name="email"
      value="<?php if (isset ( $_SESSION['email'] )): ?><?php echo $_SESSION['email']; ?>
<?php endif; ?>" />
      <br />
      <label>Nachricht</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Senden" />
    </p>
  </form>
<?php endif; ?>
</div>