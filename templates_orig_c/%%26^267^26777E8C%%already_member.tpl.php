<?php /* Smarty version 2.6.31, created on 2019-12-31 12:29:51
         compiled from es/already_member.tpl */ ?>
<h2><span class="deco">></span>Por favor identifíquese</h2>

<?php if ($_GET['badaccount'] == 1): ?>
	<p id="incorrect">Su código de usuario o su contraseña es incorrecto.</p>
<?php endif; ?>

<div id="alreadymember">
	<table>
		<tr>
			<td>
				<h3>Nuevo cliente</h3>
				<p>
					Soy un nuevo cliente.
				</p>
				<p>
					Al crear su cuenta en dicoland, podrá
					comprar en línea más rapidamente, poner al día sus
					pedidos y registrar sus precedentes compras.
				</p>
				<br />
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php" method="get">
					<input type="hidden" name="page" value="forminscription" />
					<input type="submit" value="Me registro" />
				</form>
			</td>
			<td>
				<h3>Miembro</h3>
				<p>
					Ya miembro.
				</p>
				<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
loginalready.php" method="post">

					<input type="hidden" name="page" value="alreadymember" />
					
					<label for="login_identification">Seudónimo :</label>
					<input type="text" id="login_identification"
						name="login_identification" value="" />
					
					<label for="password_identification">Contraseña :</label>
					<input type="password" id="password_identification"
						name="password_identification" value="" />
					
					<input type="submit" value="ok" />

				</form>
				<p>
					<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">¿Ha olvidado su contraseña ?</a>
				</p>
			</td>
		</tr>
	</table>
</div>