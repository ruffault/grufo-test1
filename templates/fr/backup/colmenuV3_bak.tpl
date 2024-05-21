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

	.GlobalNav {
		height: 4rem;
		line-height: 4rem;
		position: fixed;
		top: 40px;
		left: 0;
		width: 100%;
		z-index: 5;
		will-change: transform;
		}

	.GlobalNav-wrapper {
		height: 100%;
		background: #ffa500;
		transition: background-color .3S ease-out;
	}
	.GlobalNav-container {
		content:" ";
		display: block;
		clear: both;
	}
	.GlobalNav-container {
		max-width: 1182px;
		margin-left: auto;
		margin-right: auto;
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
		height: 2rem;
		width: 2rem;
}
	.Header__nav-container {
		height: 3.8rem;
	}

	.Nav {
		box-shadow: 0 .4rem .4rem 0 rgba(0,0,0,.04);
		border-top: .4rem solid #026b9c;
		height: 5.8rem;
		border-bottom: .1rem solid #eff0f3;
		padding-top: 0;
		background-color: #fff;
		align-items: center;
		color: #000b15;
		height: auto;
		position: relative;
		width: 100%;
		z-index: 6;
		display: flex;
		overflow-y: hidden;
		}
	#nav-desktop {
		position: static;
	}
	#nav-markup {
		justify-content: space-between;
		overflow: hidden;
		border-bottom: none;
		position: static;
		width: 100%;
	}
	.icon__home {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='24' height='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 4l8 7.77-1.505 1.46L12 6.926 5.505 13.23 4 11.769 12 4zM6.287 19v-4.983L12 8.615l5.713 5.402V19H13.63v-4.529h-3.262V19H6.286z' fill='%232A303B' fill-rule='evenodd'/%3E%3C/svg%3E");
		display: inline-block;
		background-position: center;
		background-size: contain;
		background-repeat: no-repeat;
		width: 2.4rem;
		height: 2.4rem;
	}
.Nav .js-burger-to-show {
	display: none;
	font-size: 1.6rem;
	line-height: 1.88;
}
.sr-only {
	border: 0 !important;
	clip: rect(1px,1px,1px,1px) !important;
	-webkit-clip-path: inset(50%) !important;
	clip-path: inset(50%) !important;
	height: 1px !important;
	overflow: hidden !important;
	padding: 0 !important;
	position: absolute !important;
	width: 1px !important;
	white-space: nowrap !important;
}
</style>
{/literal}
<script src="{$urlsite}scriptcolmenV2.js"></script>
<div class="GlobalNav">
	<div class="GlobalNav-wrapper">
		<div class="GlobalNav-container">
			<div class="Header__nav-container">
			</div>
		</div>
	</div>
</div>
<nav class="Nav" data-sticky="0">
<div id="nav-desktop">
<ul id="nav-markup">
 
<li class="Nav__item">
 <a href="#" class="js-dropdown Burger__right-arrow" data-target="actualite" role="button" aria-expanded="false">Actualités</a>
 	 <div class="Nav__sub-item js-burger-open Nav__sub-item--actualites" data-height="0">
	 	<div class="wrapper">
			<div class="Nav__container Nav__container--left">
				<span>En ce moment</span>
				<ul>
				  <li> 
				  	<a href="/coronavirus-2019-ncov/" data-suggestion="" class="js-actu-tag">Coronavirus et pandémie de Covid-19</a>
				  </li>
				  <li> 
				  	<a href="/vaccins-contre-le-covid-19/" data-suggestion="" class="js-actu-tag">Vaccins contre le Covid-19</a>
				  </li>
				  <li> 
				  	<a href="/passe-sanitaire/" data-suggestion="" class="js-actu-tag">Passe sanitaire</a>
				  </li>
				  <li> 
				  	<a href="/election-presidentielle-2022/" data-suggestion="" class="js-actu-tag">Élection présidentielle 2022</a>
				  </li>
				  <li>
				  	<a href="/education/" data-suggestion="" class="js-actu-tag">Éducation</a>
				  </li>
				  <li>
				  	<a href="/societe/" data-suggestion="" class="js-actu-tag">Société</a>
				  </li>
				  <li>
				  	<a href="/climat/" data-suggestion="" class="js-actu-tag">Climat</a>
				  </li>
				  <li>
				  	<a href="/sport/" data-suggestion="" class="js-actu-tag">Sport</a>
				  </li>
				  <li>
				  	<a href="/immigration-en-europe/" data-suggestion="" class="js-actu-tag">Immigration en Europe</a>
				  </li>
				  <li>
				  	<a href="/m-voyage-le-lieu/" data-suggestion="" class="js-actu-tag">Destinations</a>
				  </li>
				  <li>
				  	<a href="/actualite-en-continu/" data-suggestion="" class="js-actu-tag">Toute l’actualité en continu</a>
				  </li>
				 </ul>
			</div>
			<div class="Nav__container Nav__container--right Nav__container--mobile">
			 <span>Actualités</span> <div class="Nav__content Nav__content--list old__nav-content-list">
			  <ul class="old__nav-content-list-container">
			  	<li class="old__nav-content-list-item">
					<a href="/international/">International</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/politique/">Politique</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/societe/">Société</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/les-decodeurs/">Les Décodeurs</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/sport/">Sport</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/planete/">Planète</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/sciences/">Sciences</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/campus/">M Campus</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/afrique/">Le Monde Afrique</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/pixels/">Pixels</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/sante/">Santé</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/big-browser/">Big Browser</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/disparitions/">Disparitions</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/podcasts/">Podcasts</a>
				</li>
				<li class="old__nav-content-list-item">
					<a href="/le-monde-et-vous/">Le Monde &amp; Vous</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
</li>
<nav class="menu-barre">
<div id="nav-desktop">
<ul id="nav-markup">
	<li class="Nav__item Nav__item--home Nav__item--extended Nav__item--active">
		<a href="/" class="Burger__right-arrow js-home-tab" data-target="a-la-une">
			<span class="icon__home"></span>
			<span class="js-burger-to-show">À la une</span>
			<span class="sr-only">Retour à la page d’accueil du Monde</span>
		</a>
	</li>

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
</div>
</nav>
</nav>
</div>
</ul>
</div>
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
