<div id="comment">
<h4><span class="deco">&gt;</span>Comments</h4>
{if $smarty.session.id_membre}
	<a href='{$urlsite}index.php?page=addcomment&amp;id={$smarty.get.id}'>
		We would like your opinion. Please send us your comments.
	</a><br />
{/if}

{if $remarks}
	<div id="usercomment">
		{section name=remarks loop=$remarks}
			<p>
				<span>Comment from <em>{$remarks[remarks].login}</em>
				posted on {$remarks[remarks].date}</span>
				{$remarks[remarks].remarks|utf8_decode|escape|nl2br}
			</p>
		{/section}
	</div>
{else}
	No comments are available for this item as yet.<br />
{/if}
</div>