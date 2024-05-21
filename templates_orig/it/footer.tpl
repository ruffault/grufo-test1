	<div id="footer">

		{if isset($thematic)}
			<p id="thematic">
				Argomenti di questa pagina: {$thematic|utf8_encode}
			</p>
		{/if}

		[ <a href="{$urlsite}index.php?page=infolegale">Informazioni di natura legale</a> |
		<a href="{$urlsite}index.php?page=aide">Aiuto</a> |
		<a href="{$urlsite}dictionnaire-et-lexique-c0">Catalogo</a> |
		<a href="{$urlsite}index.php?page=myaccount">Il mio conto</a> |
		<a href="{$urlsite}index.php?page=showpanier">Carrello</a> |
		<a href="{$urlsite}contact">Come contattarci</a>
		]
		<br />
		[
		<a href="{$originalurl}fr">Français</a>
		| <a href="{$originalurl}en">English</a>
		| <a href="{$originalurl}de">Deutsch</a>
		| <a href="{$originalurl}es">Español</a>
		| <a href="{$originalurl}it">Italiano</a>
		]
		<br />
		<br />
		<img src="{$urlsite}img/cb.gif" alt="Pagamento con Carta Blu" />
		<img src="{$urlsite}img/visa.gif" alt="Pagamento con Visa" />
		<img src="{$urlsite}img/mastercard.gif" alt="Pagamento con Mastercard" />
		<br />
		&copy;{$smarty.now|date_format:"%Y"}  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>
