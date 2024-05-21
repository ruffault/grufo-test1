{literal}
<style>
	.menu-label,
	.menu-cb {
		appearance: none;
		height:132px;
		width: 132px;
		z-index: 5;

	}
	.menu-nav {
		position: sticky;
		top: 120px;
		height: 20%;
		width: 70%;
		padding-top: 80px;
		text-align: right;
		background: #fff;
		z-index: 4000;
		display: none;
	}

	.menu-cb:checked ~ .menu-nav {
		display: flex;
		width: 70%;
		left: 40px;
		padding: 1rem 0 3rem;
	}
#mickey {
}
	svg {
	
		height: 20px;
		width: 20px;
		z-index: 15;
	}
	.menu-barre {
		position: fixed;
		top: 90;
		left: 200;
		height: 20;
		width: 900;
		display: flex;
		z-index: 100;
	}
	.icon__search {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg height='15' width='16' xmlns='http://www.w3.org/2000/svg' fill='%23000b15'%3E%3Cpath d='M15.471 13.408l-2.817-2.824c-.025-.025-.058-.035-.086-.057a6.532 6.532 0 001.334-3.957A6.572 6.572 0 007.33 0a6.571 6.571 0 100 13.141c1.49 0 2.86-.502 3.963-1.338.023.028.033.062.06.088l2.818 2.823c.372.373.964.382 1.323.021.36-.36.35-.955-.022-1.327zm-8.156-2.166a4.687 4.687 0 114.687-4.686 4.686 4.686 0 01-4.687 4.686z' fill-rule='evenodd'/%3E%3C/svg%3E");
		background-position: center;
		background-size: contain;
		background-repeat: no-repeat;
		display: inline-block;
		flex-shrink: 0;
	}

</style>
{/literal}
<script src="{$urlsite}scriptcolmenV2.js"></script>
<nav class="menu-barre">
<label for="menu-cb" class="menu-label">
<svg version="1.1" viewBox="0 0 32 32" fill="#666">
<rect x="0" y="4" rx="3" ry="3" width="32" height="4" ></rect>
<rect x="0" y="14" rx="3" ry="3" width="32" height="4" ></rect>
<rect x="0" y="24" rx="3" ry="3" width="32" height="4" ></rect>
</svg>
<svg id="mickey" viewBox="0 0 16 16" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" class="bump" style="width: 22px; height: 22px; stroke-width: 1; transition: all 0.4s ease-in-out 0s;"><path d="M13.075 3.925A3.157 3.157 0 0 0 10.842 3c-.838 0-1.641.478-2.233 1.07L8 4.68l-.609-.61c-1.233-1.233-3.233-1.378-4.466-.145a3.158 3.158 0 0 0 0 4.467L3.534 9 8 13.788 12.466 9l.609-.608a3.157 3.157 0 0 0 0-4.467z"></path></svg>
<svg id="mickey" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" class="bump" style="width: 22px; height: 22px; stroke-width: 1; transition: all 0.4s ease-in-out 0s;"><path d="M12 21a9 9 0 110-18 9 9 0 010 18zm0-2.2a6.195 6.195 0 003.146-.85 6.61 6.61 0 002.354-2.17c-.015-.567-.36-1.09-1.034-1.567-.587-.403-1.335-.73-2.244-.984-.821-.224-1.566-.336-2.233-.336s-1.412.112-2.233.336c-.91.253-1.65.581-2.222.984-.675.478-1.02 1-1.034 1.566a6.61 6.61 0 002.354 2.17A6.262 6.262 0 0012 18.8zm0-12.1a2.62 2.62 0 00-1.364.38 2.814 2.814 0 00-1.012 1.03c-.25.432-.374.895-.374 1.387s.125.954.374 1.387c.25.433.587.776 1.012 1.03.425.253.88.38 1.364.38a2.62 2.62 0 001.364-.38 2.814 2.814 0 001.012-1.03c.25-.433.374-.895.374-1.387s-.125-.955-.374-1.387a2.814 2.814 0 00-1.012-1.03A2.62 2.62 0 0012 6.7z"></path></svg>
</label>
 <a href="/recherche/" class="search icon__search" data-target="recherche" role="button"> <span class="sr-only">Recherche</span> </a>
</nav>
<input id="menu-cb" type="checkbox" hidden class="menu-cb">
<div class="menu-nav" > <!--Code for menu starts here-->
		<ul>
		<h3 >Langues</h3>
			
				<li><a href="{$urlsite}africaines-c302">Africaines</a></li>
				<li><a href="{$urlsite}asiatiques-c303">Asiatiques</a></li>
				<li><a href="{$urlsite}langues-europeennes-europe-de-l-est-c300">Européennes</a></li>
				<li><a href="{$urlsite}langue-francaise-c166">Français</a></li>
				<li><a href="{$urlsite}indiennes-c301">Indiennes</a></li>
				<li><a href="{$urlsite}langues-regionales-de-france-c299">Régionales</a></li>
			
		
		</ul>
		
			<ul>
		<h3 class="menu_head">Industries chimiques</h3>
				<li><a href="{$urlsite}chimie-c64">Chimie</a></li>
				<li><a href="{$urlsite}imprimerie-c149">Imprimerie</a></li>
				<li><a href="{$urlsite}matieres-plastiques-c189">Matières plastiques</a></li>
				<li><a href="{$urlsite}petrole-c221">Pétrole</a></li>
				<li><a href="{$urlsite}industries-chimiques-c306">Voir plus...</a></li>
			</ul>
</div>	
