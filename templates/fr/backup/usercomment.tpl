<div id="comment">
<h4><span class="deco">&gt;</span>Commentaires</h4>
{if $smarty.session.id_membre}
	<a href='{$urlsite}index.php?page=addcomment&amp;id={$smarty.get.id}'>
		Votre avis nous intéresse. Rédigez un commentaire.
	</a><br />
{/if}

{if $remarks}
	<div id="usercomment">
		{section name=remarks loop=$remarks}
			<p>
				<span>Commentaire de <em>{$remarks[remarks].login}</em>
				le {$remarks[remarks].date}</span>
				{$remarks[remarks].remarks|utf8_decode|escape|nl2br}
			</p>
		{/section}
	</div>
{else}
	Aucun commentaire n'est encore disponible pour cet article.<br />
{/if}
</div>