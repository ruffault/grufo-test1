<?php /* Smarty version 2.6.31, created on 2024-05-17 00:15:43
         compiled from fr/myaccount.tpl */ ?>
<div id="myaccount">
<h2><span class="deco">></span>Mon compte</h2>


<p>Dans cet espace personnalisé, vous pouvez retrouver 
toutes vos informations et suivre vos commandes.</p>
<?php if ($_SESSION['id_membre']): ?>
<ul>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">Modifier mes informations</a>
	<p>Ici, vous pouvez modifier votre adresse, votre mot de passe, etc.</p></li>
	
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">Suivre l'état de mes commandes en
  direct</a>
	<p>Nous vous prévenons à chaque étape du traitement de votre commande.
	L'état s'affiche en direct, il est représenté par une barre de progression.
	Ici, Vous retrouvez aussi vos anciennes commandes et pouvez les consulter.</p></li>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Voir mon panier</a>
	<p>Accédez à l'espace panier. Vous retrouverez tous les articles que vous 
	aviez sélectionnés. Vous pouvez modifier les quantités que vous souhaitez pour
	chaque article. Il vous est aussi possible de mettre des articles de coté pour une future commande.</p>
	</li>
</ul>
<?php else: ?>
<h3>Déjà inscrit ? Identifiez-vous...</h3>
<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
login.php" method="post">
<p>
	Pseudo <input type="text" value="" name="login_identification" />
	Mot de passe <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>Mot de passe perdu ?</a>
</p>
</form>
<h3>Pas encore inscrit ?</h3>
<p><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=forminscription&amp;newaccount=1">Inscrivez-vous</a>, c'est simple et rapide.</p>
<?php endif; ?>
</div>