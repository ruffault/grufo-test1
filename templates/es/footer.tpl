  <div id="footer">

		{if isset($thematic)}
			<p id="thematic">
				Temas en está página : {$thematic|utf8_encode}
			</p>
		{/if}

		[ <a href="{$urlsite}index.php?page=infolegale">Información legal</a> |
		<a href="{$urlsite}index.php?page=aide">Ayuda</a> |
		<a href="{$urlsite}dictionnaire-et-lexique-c0">Catálogo</a> |
		<a href="{$urlsite}index.php?page=myaccount">Mi cuenta</a> |
		<a href="{$urlsite}index.php?page=showpanier">Cesta de la compra</a> |
		<a href="{$urlsite}contact">Contacto</a>
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
		<img src="{$urlsite}img/cb.gif" alt="Pago con CB" />
		<img src="{$urlsite}img/visa.gif" alt="Pago con Visa" />
		<img src="{$urlsite}img/mastercard.gif" alt="Pago con Mastercard" />
		<br />
		&copy;{$smarty.now|date_format:"%Y"}  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>
