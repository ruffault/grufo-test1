{if $smarty.get.statut == "ok"}
  <h2>Congratulazioni!</h2>
	<p>Una nuova password ti è appena stata inviata all'indirizzo che ci hai indicato.
	Da questo momento, potrai identificarti nella barra del menu in basso a 
	sinistra. Potrai successivamente modificare la tua password nella sezione 
	"Modifica le mie preferenze"</p>  
{else}
	<h2>Hai dimenticato la tua password?</h2>
	<p>
	  Inserisci l'indirizzo e-mail che hai indicato al momento della  
	  registrazione.<br />Riceverai 
	  una nuova password.
	</p>
	
	<form method="post" action="{$urlsite}sendpass.php">
	  <p>
	    Indirizzo e-mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
{/if}
