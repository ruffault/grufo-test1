<?php /* Smarty version 2.6.31, created on 2020-02-04 23:25:47
         compiled from fr/auteurs.tpl */ ?>
<div id="contact">
<h2><span class="deco">></span>Auteurs, Contactez nous</h2>
<?php if ($_GET['statut'] == 'fail'): ?>
        <strong>Vous devez communiquer votre email et écrire un message</strong>
<?php endif; ?>
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANCE<br /><br />
Tél. : +33 (0) 1 43 22 12 93<br />
Télécopie : +33 (0) 1 43 22 01 77<br /><br />
E-mail : 
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

<?php if ($_GET['statut'] == 'ok'): ?>
        <strong>Nous avons bien reçu votre  message et vous en remercions. 
        Nous vous contacterons dans les plus brefs délais.</strong>
<?php else: ?>
  <h2><span class="deco">></span>Auteurs, laissez nous vos coordonnées</h2>
  Auteurs, faites vous connaitre : laissez nous vos coordonnées par l'intermédiaire du formulaire ci-dessous.
  <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
question_auteur.php">
    <p>
      <label>Votre email</label><input type="text" name="email"
      value="<?php if (isset ( $_SESSION['email'] )): ?><?php echo $_SESSION['email']; ?>
<?php endif; ?>" />
      <br />
      <label>Message</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Envoyer" />
    </p>
  </form>
<?php endif; ?>
</div>