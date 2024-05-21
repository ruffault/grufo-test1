<h2><span class="deco">></span>Identify yourself</h2>

{if $smarty.get.badaccount == 1}
	<p id="incorrect">Your login or password is incorrect.</p>
{/if}

<div id="alreadymember">
	<table>
		<tr>
			<td>
				<h3>New client</h3>
				<p>
					I am a new client.
				</p>
				<p>
					By creating an account with Dicoland you will be able
					to purchase online more quickly, be up to date with
					your orders and keep a record of your previous purchases.
				</p>
				<br />
				<form action="{$urlsite}index.php" method="get">
					<input type="hidden" name="page" value="forminscription" />
					<input type="submit" value="I want to register" />
				</form>
			</td>
			<td>
				<h3>Member</h3>
				<p>
					I am already a member.
				</p>
				<form action="{$urlsite}loginalready.php" method="post">

					<input type="hidden" name="page" value="alreadymember" />
					
					<label for="login_identification">Alias:</label>
					<input type="text" id="login_identification"
						name="login_identification" value="" />
					
					<label for="password_identification">Password:</label>
					<input type="password" id="password_identification"
						name="password_identification" value="" />
					
					<input type="submit" value="ok" />

				</form>
				<p>
					<a href="{$urlsite}index.php?page=lastpass">Forgotten your password?</a>
				</p>
			</td>
		</tr>
	</table>
</div>
