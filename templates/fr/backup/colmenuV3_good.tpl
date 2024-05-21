{literal}
<style>
	.menu-cb2,
	.menu-cb,
	.menu-search {
		appearance: none;
		height:1rem;
		width: 1rem;
		z-index: 5;
		display: none;

	}
	.menu-nav {
		position: inherit;
		height: 40%;
		width: 100%;
		max-width:100%;
		text-align: right;
		background: #fff;
		z-index: 4000;
		flex-wrap: wrap;
		display: none;
	}

	#search {
		display: none;
	}

	.menu-search:checked ~ #search {
		display: block;
	}
	
	.search2 {
		position: sticky;
		top: 120px;
		height: 20%;
		width: 70%;
		padding-top: 80px;
		text-align: right;
		background: #fff;
		z-index: 4000;
		display:none;
	}

	.menu-search:checked ~ .search2 {
		display: block;
	}

	.menu-cb2:checked ~ .menu-nav {
		display: flex;
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
		height: 3rem;
		line-height: 3rem;
		position: sticky;
		top: .4rem;
		width: 100%;
		margin: auto;
		z-index: 1000;
		will-change: transform;
		}

	.GlobalNav-wrapper {
		height: 100%;
		background: #ffa500;
		display: flex;
		z-index: 100;
		transition: background-color .3S ease-out;
		position: relative;
	}
	.GlobalNav-container a, .GlobalNav-container label {
		text-decoration: none;
		margin: inherit;
		font-size:12px;
	}

	.GlobalNav-container {
		content:" ";
		display: flex;
		clear: both;
		z-index: inherit;
		max-width: 100%;
		margin-left: auto;
		margin-right: auto;
		width: 80%;
	}
	.menu-barre {
		position: fixed;
		top: 190;
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
		height: 3rem;
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
		width: 3rem;
		height: 3rem;
	}
.Burger__icon {
	background-position: center;
	background-size: contain;
	background-repeat: no-repeat;
	display: flex;
	flex-shrink: 0;
	height: 3rem;
	width: 3rem;
	background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='24' height='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M3 18h18v-2H3v2zM3 8h18V6H3v2zm0 5h18v-2H3v2z' fill='%232A303B' fill-rule='evenodd'/%3E%3C/svg%3E");
	align-self: center;
}
.Burger__contextual {
	display: flex;
	z-index: 7;
}
.Burger {
	cursor: pointer;
	display: block;
	justify-content: center;
	align-content: center;
	width: 5.6rem;
	background: 0 0;
	border: 0;
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
.menu_item:active + div {
	display: block;
}
.item_barrow::after, .Nav__mobile> a.dropdown-burger-open::after {
  content: " ";
  position: absolute;
  width: 1rem;
  height: 1rem;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='10' xmlns='http://www.w3.org/2000/svg' fill='%23717B8E'%3E%3Cpath d='M4 4V0h2v4h4v2H6v4H4V6H0V4h4z' fill-rule='evenodd'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	align-self: center;
	margin-left: .4rem;
	display: inline-block;
	visibility: visible;
}
</style>
{/literal}
<script src="{$urlsite}scriptcolmenV2.js"></script>
<div class="GlobalNav">
	<div class="GlobalNav-wrapper">
		<div class="GlobalNav-container">
			<button id="Burger-desktop" class="Burger Burger__contextual js-nav-burger">
				<span class="Burger__icon">
					<span class="sr-only">Navigation</span>
				</span>
			</button>
<!--			<div class="Header__nav-container"> -->
					<a href="/" class="Burger__right-arrow js-home-tab" data-target="a-la-une">
						<span class="icon__home"></span>
						<span class="sr-only">Retour à la page d’accueil du Monde</span>
					</a>
<!--			</div> -->
			<label for="menu-cb2" >Tous Livres</label>
			  
			<a class="menu_item" href="#">Nos Livres</a>  
			<a class="menu_item" href="#">E-Book</a>  
			<a class="menu_item" href="#">Livres Occasion</a>  
			<a class="menu_item" href="#">Contact</a>  
			<a class="menu_item" href="#">Aide</a>  
			<label for="menu-search" class="icon__search" class="menu-search">
 			
						<!-- <a href="#" class="search icon__search" data-target="recherche" role="button"> --> 
				<span class="sr-only">Recherche</span>
			<!-- </a> -->
			</label>
			<div class="item_barrow">
			ma flèche
			</div>
		</div>
	</div>
</div>

<!-- <nav class="menu-barre">
	

	<label for="menu-cb" class="menu-label">
		<svg version="1.1" viewBox="0 0 32 32" fill="#666">
			<rect x="0" y="4" rx="3" ry="3" width="32" height="4" ></rect>
			<rect x="0" y="14" rx="3" ry="3" width="32" height="4" ></rect>
			<rect x="0" y="24" rx="3" ry="3" width="32" height="4" ></rect>
		</svg>
		<svg id="mickey" viewBox="0 0 16 16" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" class="bump" style="width: 22px; height: 22px; stroke-width: 1; transition: all 0.4s ease-in-out 0s;"><path d="M13.075 3.925A3.157 3.157 0 0 0 10.842 3c-.838 0-1.641.478-2.233 1.07L8 4.68l-.609-.61c-1.233-1.233-3.233-1.378-4.466-.145a3.158 3.158 0 0 0 0 4.467L3.534 9 8 13.788 12.466 9l.609-.608a3.157 3.157 0 0 0 0-4.467z"></path></svg>
		<svg id="mickey" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" class="bump" style="width: 22px; height: 22px; stroke-width: 1; transition: all 0.4s ease-in-out 0s;"><path d="M12 21a9 9 0 110-18 9 9 0 010 18zm0-2.2a6.195 6.195 0 003.146-.85 6.61 6.61 0 002.354-2.17c-.015-.567-.36-1.09-1.034-1.567-.587-.403-1.335-.73-2.244-.984-.821-.224-1.566-.336-2.233-.336s-1.412.112-2.233.336c-.91.253-1.65.581-2.222.984-.675.478-1.02 1-1.034 1.566a6.61 6.61 0 002.354 2.17A6.262 6.262 0 0012 18.8zm0-12.1a2.62 2.62 0 00-1.364.38 2.814 2.814 0 00-1.012 1.03c-.25.432-.374.895-.374 1.387s.125.954.374 1.387c.25.433.587.776 1.012 1.03.425.253.88.38 1.364.38a2.62 2.62 0 001.364-.38 2.814 2.814 0 001.012-1.03c.25-.433.374-.895.374-1.387s-.125-.955-.374-1.387a2.814 2.814 0 00-1.012-1.03A2.62 2.62 0 0012 6.7z"></path></svg>
	</label>
</nav> -->

<input id="menu-cb2" type="checkbox" hidden class="menu-cb2">
<input id="menu-search" type="checkbox"  class="menu-search">
<div id="search" class="search2">
                  <form method="get" action="https://dicotest.grufo.ovh/fr/index.php">
                        <p>
						<input type="hidden" name="page" value="showresult">
                        <label for="searchbar">Rechercher</label>
                        <input id="searchbar" name="quicksearch" type="text" value="">
                        <input type="image" alt="Go !" src="https://dicotest.grufo.ovh/fr/css/go.gif" name="quicksearch_submit">
                        <a href="https://dicotest.grufo.ovh/fr/index.php?page=advancedsearch" id="advancedsearch">Recherche avancée</a>
                  		</p>
                  </form>
</div>
<div class="menu-nav" > <!--Code for menu starts here-->
		<ul>
		<h3 class="menu_head">Langues</h3>
			
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
	
		
			<ul>
		<h3 class="menu_head">Industries diverses</h3>
		
				<li><a href="{$urlsite}arts-spectacles-c28">Arts &amp; Spectacle</a></li>
				<li><a href="{$urlsite}defense-militaire-c92">Défense - Militaire</a></li>
				<li><a href="{$urlsite}photo-video-cinema-c224">Photo - Vidéo - Cinéma</a></li>
				<li><a href="{$urlsite}sports-c262">Sports</a></li>
				<li><a href="{$urlsite}industries-diverses-c307">Voir plus...</a></li>
			</ul>
		
		
   			<ul>
        <h3 class="menu_head">Sciences physiques</h3>
        
       			<li><a href="{$urlsite}electricite-c106">Electricité</a></li>
				<li><a href="{$urlsite}electronique-c108">Electronique</a></li>
        		<li><a href="{$urlsite}informatique-c152">Informatique</a></li>
        		<li><a href="{$urlsite}mecanique-c190">Mécanique</a></li>
				<li><a href="{$urlsite}sciences-physiques-c311">Voir plus...</a></li>
			</ul>
		

        	<ul>
        <h3 class="menu_head">Sciences de la terre</h3>
        
				<li><a href="{$urlsite}agriculture-c6">Agriculture</a></li>
				<li><a href="{$urlsite}elevage-c109">Elevage</a></li>
				<li><a href="{$urlsite}eau-c101">Eau</a></li>
				<li><a href="{$urlsite}pedologie-c218">Pédologie</a></li>
				<li><a href="{$urlsite}sciences-de-la-terre-c309">Voir plus...</a></li>
			</ul>
		
		
	        <ul>
		<h3 class="menu_head">Sciences de la vie</h3>
		
				<li><a href="{$urlsite}agro-alimentaire-c7">Agro-alimentaire</a></li>
				<li><a href="{$urlsite}biologie-c46">Biologie</a></li>
				<li><a href="{$urlsite}medecine-c192">Médecine</a></li>
				<li><a href="{$urlsite}pharmacie-c222">Pharmacie</a></li>
				<li><a href="{$urlsite}sciences-de-la-vie-c310">Voir plus...</a></li>
			</ul>
		
		
        	<ul>
		<h3 class="menu_head">Transports</h3>
		
      			<li><a href="{$urlsite}aeronautique-c4">Aéronautique</a></li>
				<li><a href="{$urlsite}automobile-c31">Automobile</a></li>
				<li><a href="{$urlsite}marine-c184">Marine</a></li>
				<li><a href="{$urlsite}transports-c285">Voir plus...</a></li>
			</ul>
		

        	<ul>
		<h3 class="menu_head">Bâtiment / Travaux</h3>
		
        		<li><a href="{$urlsite}architecture-c24">Architecture</a></li>
				<li><a href="{$urlsite}batiment-c38">Batiment général</a></li>
				<li><a href="{$urlsite}routes-c245">Route</a></li>
				<li><a href="{$urlsite}batiment-travaux-publics-c305">Voir plus...</a></li>
			</ul>
		
		
        	<ul>
        <h3 class="menu_head">Entreprise</h3>
       
				<li><a href="{$urlsite}assurance-c29">Assurance</a></li>
				<li><a href="{$urlsite}banque-finance-c34">Banque / finance</a></li>
				<li><a href="{$urlsite}commerce-c69">Commerce</a></li>
				<li><a href="{$urlsite}droit-c99">Droit</a></li>
				<li><a href="{$urlsite}economie-c103">Economie</a></li>
				<li><a href="{$urlsite}administration-et-gestion-de-l-entreprise-c308">Voir plus...</a></li>
			</ul>
		
		
        	<ul>
        <h3 class="menu_head">Technos Numériques</h3>
      
				<li><a href="{$urlsite}dictionnaires-electroniques-c312">Dictionnaires électroniques</a></li>
				<li><a href="{$urlsite}Audio-Video-c352">Audio /Vidéo</a></li>
				<li><a href="{$urlsite}support-informatique-c59">Supports numériques</a></li>
				<li><a href="{$urlsite}logiciel-c174">Logiciel</a></li>
			</ul>
		
		
        	<ul>
		<h3 class="menu_head">Divers</h3>
		
				<li><a href="{$urlsite}Cuisine-Gastronomie-c344">Cuisine / Gastronomie</a></li>
				<li><a href="{$urlsite}Artisanat-c349">Artisanat</a></li>
				<li><a href="{$urlsite}abreviations-c1">Abréviations</a></li>
				<li><a href="{$urlsite}sigles-c256">Sigles</a></li>
				<li><a href="{$urlsite}divers-c95">Divers</a></li>
			</ul>

</div>	<!--Code for menu ends here-->
