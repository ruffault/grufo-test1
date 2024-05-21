<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:37
         compiled from es/contact.tpl */ ?>
<div id="contact">
<h2><span class="deco">></span>Contacto</h2>
<?php if ($_GET['statut'] == 'fail'): ?>
        <strong>Debe transmitir su correo electrónico y enviar un mensaje</strong>
<?php endif; ?>
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANCIA<br /><br />
Tel: +33 (0) 1 43 22 12 93<br />
Fax: +33 (0) 1 43 22 01 77<br /><br />
De lunes a viernes de 10:00 a 18:00 horas (hora de París)<br /><br />
E-mail : 
<a href="mailto:service-client@dicoland.com">servicio-cliente@dicoland.com</a>
</p>

<?php if ($_GET['statut'] == 'ok'): ?>
        <strong>Hemos recibido su mensaje.
        Le responderemos lo antes posible.</strong>
<?php else: ?>
  <h2><span class="deco">></span>Preguntas en directo</h2>
  <form method="post" action="question.php">
    <p>
      <label>Su correo electrónico</label><input type="text" name="email"
      value="<?php if (isset ( $_SESSION['email'] )): ?><?php echo $_SESSION['email']; ?>
<?php endif; ?>" />
      <br />
      <label>Mensaje</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Enviar" />
    </p>
  </form>
<?php endif; ?>
</div>