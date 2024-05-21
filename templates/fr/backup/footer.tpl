  <div id="footer">
		
		{if isset($thematic)}
			<p id="thematic">
				Thèmes de cette page : {$thematic|utf8_encode}
			</p>

		{/if}

		[ <a href="{$urlsite}index.php?page=infolegale">Informations légales</a> |
		<a href="{$urlsite}index.php?page=aide">Aide</a> |
		<a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Catalogue</a> |
		<a href="{$urlsite}index.php?page=myaccount">Mon compte</a> |
		<a href="{$urlsite}index.php?page=showpanier">Panier</a> |
		<a href="{$urlsite}contact">Nous contacter</a>
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
		<img src="{$urlsite}img/cb.gif" alt="Paiement par Carte Bleue" />
		<img src="{$urlsite}img/visa.gif" alt="Paiement par Visa" />
		<img src="{$urlsite}img/mastercard.gif" alt="Paiement par Mastercard" />
		<br />
		&copy;{$smarty.now|date_format:"%Y"}  Dicoland.com - CNIL N°1040664
	</div> 
</div>
</div>
</body>
</html>