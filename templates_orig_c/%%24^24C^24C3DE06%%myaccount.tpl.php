<?php /* Smarty version 2.6.31, created on 2019-11-18 01:21:29
         compiled from de/myaccount.tpl */ ?>
<div id="myaccount">
<h2><span class="deco">></span>Mein Konto</h2>


<p>In dieser persönlichen Rubrik können Sie alle Ihre Daten einsehen und Ihre 
Bestellungen verfolgen. </p>
<?php if ($_SESSION['id_membre']): ?>
<ul>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">Meine Daten ändern</a>
	<p>Hier können Sie Ihre Adresse, Ihr Passwort u.a. Daten ändern. </p></li>
	
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">Bearbeitungsstand meiner Bestellungen online verfolgen</a>
	<p>Sie werden über jeden Schritt bei der Bearbeitung Ihrer Bestellung von uns informiert. 
	Der jeweilige Bearbeitungsstand wird online auf einer Fortschrittsleiste angezeigt. 
	In dieser Rubrik können Sie auch Ihre vorhergehenden Bestellungen wiederfinden und einsehen.</p></li>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Meinen Warenkorb einsehen</a>
	<p>Gehen Sie in die Rubrik Warenkorb. Sie finden dort alle von Ihnen ausgesuchten
	Artikel. Sie können die gewünschten Mengen für jeden einzelnen Artikel ändern und Artikel 
	für spätere Bestellungen auf Seite legen. </p>
	</li>
</ul>
<?php else: ?>
<h3>Schon angemeldet? Dann loggen Sie sich ein.</h3>
<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
login.php" method="post">
<p>
	Pseudonym <input type="text" value="" name="login_identification" />
	Passwort <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>Passwort verloren?</a>
</p>
</form>
<h3>Noch nicht angemeldet?</h3>
<p><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=forminscription&amp;newaccount=1">Melden Sie sich an</a>, einfach und schnell.</p>
<?php endif; ?>
</div>