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
		El e-mail ha sido enviado correctamente. Si lo desea puede
		enviar otro.
	</div>
{elseif $notfull == 1}
	<div style='text-align:center;'><strong>Complete todos los campos</strong></div>
{/if}

<form method='post' action='recommend.php?id={$smarty.get.id}' >
  <div class='modifpref'>
    <h3>Recomendar la obra a un amigo</h3>
    <div class="rang">
      <span class="formgauche">Su nombre</span>
      <span class="formdroite"><input type='text' name='yourname'
			value='{$smarty.post.yourname}' /></span>
    </div>
    <div class="rang">
      <span class="formgauche">Su e-mail</span><span class="formdroite"><input type='text' name='youremail' value='{$smarty.post.youremail}' /></span>
    </div>
    <div class="rang">
      <span class="formgauche">El e-mail de su amigo</span><span class="formdroite"><input type='text' name='friendemail' value='{$smarty.post.friendmail}' /></span>
    </div>
    <div class="rang">
    <br />
    <input type="submit" value="Enviar" name="envoyer" />
    </div>
  </div>
</form>
<a href="#" onclick="window.close(); return false;">Cerrar esta ventana</a>

</body>
</html>
