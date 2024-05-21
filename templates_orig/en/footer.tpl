  <div id="footer">

		{if isset($thematic)}
			<p id="thematic">
				Themes in this page : {$thematic|utf8_encode}
			</p>
		{/if}

		[ <a href="{$urlsite}index.php?page=infolegale">Legal information</a> |
		<a href="{$urlsite}index.php?page=aide">Help</a> |
		<a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Catalogue</a> |
		<a href="{$urlsite}index.php?page=myaccount">My account</a> |
		<a href="{$urlsite}index.php?page=showpanier">Basket</a> |
		<a href="{$urlsite}contact">Contact us</a>
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
		<img src="{$urlsite}img/cb.gif" alt="Payment by Carte Bleue" />
		<img src="{$urlsite}img/visa.gif" alt="Payment by Visa" />
		<img src="{$urlsite}img/mastercard.gif" alt="Payment by Mastercard" />
		<br />
		&copy;{$smarty.now|date_format:"%Y"}  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>
