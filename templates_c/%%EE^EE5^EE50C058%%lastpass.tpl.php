<?php /* Smarty version 2.6.31, created on 2019-11-20 17:05:54
         compiled from fr/lastpass.tpl */ ?>
<?php if ($_GET['statut'] == 'ok'): ?>
  <h2>Félicitations</h2>
	<p>Un nouveau mot de passe vient d'être envoyé à l'adresse que vous avez fournie.
	Vous pouvez dès maintenant vous identifier en bas de la barre de menu située à 
	gauche. Vous pourrez ensuite modifier votre mot de passe dans la partie
	"Modifier mes préférences"</p>  
<?php else: ?>
	<h2>Mot de passe oublié ?</h2>
	<p>
	  Entrez l'adresse e-mail que vous aviez fourni lors de 
	  votre inscription.<br />Nous allons vous faire 
	  parvenir un nouveau mot de passe.
	</p>
	
	<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
sendpass.php">
	  <p>
	    E-mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
<?php endif; ?>