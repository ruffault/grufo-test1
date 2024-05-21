<div id="comment">
<h4><span class="deco">&gt;</span>Commenti</h4>
{if $smarty.session.id_membre}
	<a href='{$urlsite}index.php?page=addcomment&amp;id={$smarty.get.id}'>
		La tua opinione ci interessa. Inserisci un commento.
	</a><br />
{/if}

{if $remarks}
	<div id="usercomment">
		{section name=remarks loop=$remarks}
			<p>
				<span>Commento di <em>{$remarks[remarks].login}</em>
				il {$remarks[remarks].date}</span>
				{$remarks[remarks].remarks|utf8_decode|escape|nl2br}
			</p>
		{/section}
	</div>
{else}
	Per questo articolo non ci sono ancora commenti disponibili.<br />
{/if}
</div>