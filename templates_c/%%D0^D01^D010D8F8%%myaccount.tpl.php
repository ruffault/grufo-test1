<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:45
         compiled from it/myaccount.tpl */ ?>
<div id="myaccount">
<h2><span class="deco">></span>Il mio conto</h2>


<p>In questo spazio privato puoi ritrovare 
tutte le tue informazioni e controllare i tuoi ordini.</p>
<?php if ($_SESSION['id_membre']): ?>
<ul>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">Modificare i miei dati</a>
	<p>Qui è possibile modificare il tuo indirizzo, la tua password, ecc.</p></li>
	
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">Seguire lo stato dei miei ordini 
  online</a>
	<p>Noi ti informiamo ad ogni fase dell'evasione del tuo ordine.
	Lo stato dell'ordine viene visualizzato online ed è rappresentato mediante una barra di progressione.
	Qui troverai anche i tuoi ordini precedenti e potrai consultarli.</p></li>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Visualizzare il mio carrello</a>
	<p>Accedi allo spazio del carrello. Potrai ritrovare tutti gli articoli che 
	avevi selezionato. Puoi modificare le quantità che desideri ordinare per
	ogni articolo. E' possibile anche mettere da parte alcuni articoli per un ordine futuro.</p>
	</li>
</ul>
<?php else: ?>
<h3>Sei già registrato? Effettua il login...</h3>
<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
login.php" method="post">
<p>
	Username <input type="text" value="" name="login_identification" />
	Password <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>Hai dimenticato la tua password?</a>
</p>
</form>
<h3>Non sei ancora registrato?</h3>
<p><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=forminscription&amp;newaccount=1">Registrati</a>, è semplice e veloce.</p>
<?php endif; ?>
</div>