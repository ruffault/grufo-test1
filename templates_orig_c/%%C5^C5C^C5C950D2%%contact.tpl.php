<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:14
         compiled from en/contact.tpl */ ?>
<div id="contact">
<h2><span class="deco">></span>Contact us</h2>
<?php if ($_GET['statut'] == 'fail'): ?>
        <strong>You must send us your e-mail address by writing us a message</strong>
<?php endif; ?>
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANCE<br /><br />
Tel.: +33 (0) 1 43 22 12 93<br />
Fax: +33 (0) 1 43 22 01 77<br /><br />
Monday to Friday from 10 am to 6 pm and Saturday from 14 am to 6 pm (Paris time)
<br /><br />
E-mail: 
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

<?php if ($_GET['statut'] == 'ok'): ?>
        <strong>Thank you, we have received your message. 
        We will reply as soon as possible.</strong>
<?php else: ?>
  <h2><span class="deco">></span>Direct question</h2>
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
question.php">
    <p>
      <label>Your e-mail address</label><input type="text" name="email"
      value="<?php if (isset ( $_SESSION['email'] )): ?><?php echo $_SESSION['email']; ?>
<?php endif; ?>" />
      <br />
      <label>Message</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Send" />
    </p>
  </form>
<?php endif; ?>
</div>