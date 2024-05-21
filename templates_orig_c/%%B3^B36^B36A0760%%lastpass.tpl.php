<?php /* Smarty version 2.6.31, created on 2019-12-29 07:30:28
         compiled from en/lastpass.tpl */ ?>
<?php if ($_GET['statut'] == 'ok'): ?>
  <h2>Congratulations</h2>
	<p>A new password has just been sent to the address you provided.
	You can now log-in at the bottom of the menu bar on the left-had side of the 
  screen. Your attributed password can then be modified in the "Modify 
  My Preferences" section</p>  
  <?php else: ?>
	<h2>Forgotten your password?</h2>
	<p>
	  Enter the e-mail address you provided at registration.<br />We will send 
    you a new password.</p>
	
	<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
sendpass.php">
	  <p>
	    E-mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
<?php endif; ?>