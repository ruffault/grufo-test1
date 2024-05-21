<?php /* Smarty version 2.6.31, created on 2019-12-31 07:45:31
         compiled from it/lastpass.tpl */ ?>
<?php if ($_GET['statut'] == 'ok'): ?>
  <h2>Congratulazioni!</h2>
	<p>Una nuova password ti è appena stata inviata all'indirizzo che ci hai indicato.
	Da questo momento, potrai identificarti nella barra del menu in basso a 
	sinistra. Potrai successivamente modificare la tua password nella sezione 
	"Modifica le mie preferenze"</p>  
<?php else: ?>
	<h2>Hai dimenticato la tua password?</h2>
	<p>
	  Inserisci l'indirizzo e-mail che hai indicato al momento della  
	  registrazione.<br />Riceverai 
	  una nuova password.
	</p>
	
	<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
sendpass.php">
	  <p>
	    Indirizzo e-mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
<?php endif; ?>