<?php /* Smarty version 2.6.31, created on 2024-05-17 12:15:47
         compiled from fr/already_member.tpl */ ?>
<h2><span class="deco">></span>Indentifiez-vous</h2>

<?php if ($_GET['badaccount'] == 1): ?>
	<p id="incorrect">Votre login ou votre mot de passe est incorrect.</p>
<?php endif; ?>

<div id="alreadymember">
	<table>
		<tr>
			<td>
				<h3>Nouveau client</h3>
				<p>
					Je suis un nouveau client.
				</p>
				<p>
					En créant un compte auprès de dicoland vous serez à même
					d'acheter en ligne plus vite, d'être à jour dans vos
					commandes et de garder trace de vos précédents achats.
				</p>
				<br />
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php" method="get">
					<input type="hidden" name="page" value="forminscription" />
					<input type="submit" value="Je m'inscris" />
				</form>
			</td>
			<td>
				<h3>Client membre</h3>
				<p>
					Je suis déjà membre.
				</p>
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
loginalready.php" method="post">

					<input type="hidden" name="page" value="alreadymember" />
					
					<label for="login_identification">Pseudo :</label>
					<input type="text" id="login_identification"
						name="login_identification" value="" />
					
					<label for="password_identification">Mot de passe :</label>
					<input type="password" id="password_identification"
						name="password_identification" value="" />
					
					<input type="submit" value="ok" />

				</form>
				<p>
					<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">Mot de passe perdu ?</a>
				</p>
			</td>
		</tr>
	</table>
</div>