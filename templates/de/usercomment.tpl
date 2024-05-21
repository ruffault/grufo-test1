<div id="comment">
<h4><span class="deco">&gt;</span>Lesermeinungen</h4>
{if $smarty.session.id_membre}
	<a href='{$urlsite}index.php?page=addcomment&amp;id={$smarty.get.id}'>
		Ihre Meinung interessiert uns. Teilen Sie sie uns mit. 
	</a><br />
{/if}

{if $remarks}
	<div id="usercomment">
		{section name=remarks loop=$remarks}
			<p>
				<span>Lesermeinung von <em>{$remarks[remarks].login}</em>
				le {$remarks[remarks].date}</span>
				{$remarks[remarks].remarks|utf8_decode|escape|nl2br}
			</p>
		{/section}
	</div>
{else}
	Zu diesem Artikel gibt es bislang keine Lesermeinungen.<br />
{/if}
</div>