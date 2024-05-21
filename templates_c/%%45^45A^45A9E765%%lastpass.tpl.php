<?php /* Smarty version 2.6.31, created on 2019-12-09 01:48:46
         compiled from de/lastpass.tpl */ ?>
<?php if ($_GET['statut'] == 'ok'): ?>
  <h2>Herzlichen Glückwunsch</h2>
	<p>Ein neues Passwort wurde soeben an die von Ihnen angegebene Adresse geschickt.
  Sie können sich jetzt unter der Menüleiste links einloggen und anschließend Ihr
  Passwort in der Rubrik "Meine Vorzugseinstellungen ändern" ändern.</p>  
<?php else: ?>
	<h2>Passwort vergessen?</h2>
	<p>
	  Geben Sie die bei Ihrer Anmeldung genannte E-Mail-Adresse ein.<br />
    Wir schicken Ihnen ein neues Passwort. 
	</p>
	
	<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
sendpass.php">
	  <p>
	    E-Mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
<?php endif; ?>