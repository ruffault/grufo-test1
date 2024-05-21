<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Dicoland.com</title>
        <style type="text/css" media="screen">@import "{$urlsite}css/style.css";</style>
</head>
<body style='text-align:center'>
<br />

{if $allok == 1}
	<div style='text-align:center;'>
		Congratulazioni, il tuo messaggio e-mail è stato inviato con successo. Puoi inviarne un altro, 
    se lo desideri.
	</div>
{elseif $notfull == 1}
	<div style='text-align:center;'><strong>Compilare tutti i campi</strong></div>
{/if}

<form method='post' action='{$urlsite}recommend.php?id={$smarty.get.id}' >
  <div class='modifpref'>
    <h3>Consiglia l'opera a un amico</h3>
    <div class="rang">
      <span class="formgauche">Il tuo nome </span>
      <span class="formdroite"><input type='text' name='yourname'
			value='{$smarty.post.yourname}' /></span>
    </div>
    <div class="rang">
      <span class="formgauche">Il tuo indirizzo e-mail </span><span class="formdroite"><input type='text' name='youremail' value='{$smarty.post.youremail}' /></span>
    </div>
    <div class="rang">
      <span class="formgauche">L'indirizzo e-mail del tuo amico </span><span class="formdroite"><input type='text' name='friendemail' value='{$smarty.post.friendmail}' /></span>
    </div>
    <div class="rang">
    <br />
    <input type="submit" value="Invio" name="envoyer" />
    </div>
  </div>
</form>
<a href="#" onclick="window.close(); return false;">Chiudi questa finestra</a>

</body>
</html>
