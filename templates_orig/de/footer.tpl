  <div id="footer">

		{if isset($thematic)}
			<p id="thematic">
				Themen auf dieser Seite : {$thematic|utf8_encode}
			</p>
		{/if}

		[ <a href="{$urlsite}index.php?page=infolegale">Allg. Geschäftsbedingungen</a> |
		<a href="{$urlsite}index.php?page=aide">Hilfe</a> |
		<a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Katalog</a> |
		<a href="{$urlsite}index.php?page=myaccount">Mein Konto</a> |
		<a href="{$urlsite}index.php?page=showpanier">Warenkorb</a> |
		<a href="{$urlsite}contact">Kontakt</a>
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
		<img src="{$urlsite}img/cb.gif" alt="Zahlung per Kreditkarte" />
		<img src="{$urlsite}img/visa.gif" alt="Zahlung per Visa-Karte" />
		<img src="{$urlsite}img/mastercard.gif" alt="Zahlung per Mastercard" />
		<br />
		&copy;{$smarty.now|date_format:"%Y"}  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>
