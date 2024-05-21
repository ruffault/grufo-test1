<div id="comment">
<h4><span class="deco">&gt;</span>Comentarios</h4>
{if $smarty.session.id_membre}
	<a href='{$urlsite}index.php?page=addcomment&amp;id={$smarty.get.id}'>
		Su opinión nos interesa. Escriba un comentario.
	</a><br />
{/if}

{if $remarks}
	<div id="usercomment">
		{section name=remarks loop=$remarks}
			<p>
				<span>Comentario de<em>{$remarks[remarks].login}</em>
				le {$remarks[remarks].date}</span>
				{$remarks[remarks].remarks|utf8_decode|escape|nl2br}
			</p>
		{/section}
	</div>
{else}
	Todavía no hay ningún comentario para este artículo.<br />
{/if}
</div>