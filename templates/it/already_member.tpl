<h2><span class="deco">></span>Identificati</h2>

{if $smarty.get.badaccount == 1}
	<p id="incorrect">Lo username o la password sono scorretti.</p>
{/if}

<div id="alreadymember">
	<table>
		<tr>
			<td>
				<h3>Nuovo cliente</h3>
				<p>
					Sono un nuovo cliente.
				</p>
				<p>
					Creando un conto presso dicoland avrete la possibilità di
					acquistare online in modo più rapido, di seguire lo stato dei
					vostri ordini e di conservare una traccia dei vostri acquisti precedenti.
				</p>
				<br />
				<form action="{$urlsite}index.php" method="get">
					<input type="hidden" name="page" value="forminscription" />
					<input type="submit" value="Mi iscrivo" />
				</form>
			</td>
			<td>
				<h3>Cliente già registrato</h3>
				<p>
					Sono già registrato.
				</p>
				<form action="{$urlsite}loginalready.php" method="post">

					<input type="hidden" name="page" value="alreadymember" />
					
					<label for="login_identification">Username:</label>
					<input type="text" id="login_identification"
						name="login_identification" value="" />
					
					<label for="password_identification">Password:</label>
					<input type="password" id="password_identification"
						name="password_identification" value="" />
					
					<input type="submit" value="ok" />

				</form>
				<p>
					<a href="{$urlsite}index.php?page=lastpass">Hai dimenticato la tua password?</a>
				</p>
			</td>
		</tr>
	</table>
</div>
