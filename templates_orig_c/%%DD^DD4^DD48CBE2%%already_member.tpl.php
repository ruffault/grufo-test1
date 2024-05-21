<?php /* Smarty version 2.6.31, created on 2019-12-08 09:03:05
         compiled from de/already_member.tpl */ ?>
<h2><span class="deco">></span>Loggen Sie sich ein</h2>

<?php if ($_GET['badaccount'] == 1): ?>
	<p id="incorrect">Login bzw. Passwort stimmt nicht.</p>
<?php endif; ?>

<div id="alreadymember">
	<table>
		<tr>
			<td>
				<h3>Neuer Kunde</h3>
				<p>
					Ich bin neuer Kunde.
				</p>
				<p>
					Mit einem Kundenkonto bei Dicoland können Sie schneller
          online bestellen und sich einen Überblick über laufende 
          Bestellungen und vorherige Einkäufe verschaffen.
        </p>
				<br />
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php" method="get">
					<input type="hidden" name="page" value="forminscription" />
					<input type="submit" value="Ich melde mich an" />
				</form>
			</td>
			<td>
				<h3>Mitglied</h3>
				<p>
					Ich bin bereits Mitglied.
				</p>
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
loginalready.php" method="post">

					<input type="hidden" name="page" value="alreadymember" />
					
					<label for="login_identification">Pseudo:</label>
					<input type="text" id="login_identification"
						name="login_identification" value="" />
					
					<label for="password_identification">Passwort:</label>
					<input type="password" id="password_identification"
						name="password_identification" value="" />
					
					<input type="submit" value="ok" />

				</form>
				<p>
					<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">Passwort vergessen?</a>
				</p>
			</td>
		</tr>
	</table>
</div>