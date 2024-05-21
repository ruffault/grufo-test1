
{literal}
<script type="text/javascript">
$(document).ready(function(){
	//Configuration
		  var retour = true;
		  var tempsTransition = 1000;
		  var affichePlayPause = true;
		  var lectureAutomatique = true;
		  	var tempsAttente = 6000;
			
		  var icones = new Array();
		  		icones['play'] = 'img/play_slider.png';
		  		icones['pause'] = 'img/pause_slider.png';	
			
		  var currentPosition = 0;
		  var slideWidth = 500;
		  var slides = $('.slide');
		  var numberOfSlides = slides.length;
		  var interval;
		  var lectureEnCours = false;
  // Supprime la scrollbar en JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Attribue  #slideInner  à toutes les div .slide
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Longueur de #slideInner égale au total de la longueur de tous les slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Précédent</span>')
    .append('<span class="control" id="rightControl">Suivant</span>');


  
  // Hide left arrow control on first load
  manageControls(currentPosition);

  //Crée un écouteur d'évènement de type clic sur les classes .control
  $('.control')
    .bind('click', function(){
		
    // Determine la nouvelle position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	if(currentPosition == numberOfSlides && retour == false ){
		currentPosition--;
		pause();
	}
	
	// Cache ou montre les controles
    manageControls(currentPosition);
    // Fais bouger le slide
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    },tempsTransition);
  });

  // manageControls: Cache ou montre les flêches de controle en fonction de la position courante
  function manageControls(position){
    // Cache la fleche "précédent" si on est sur le premier slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Cache la fleche "suivant" si on est sur le dernier slide (et que le retour automatique n'est pas activé)
    if(position==numberOfSlides-1 && retour == false){
		$('#rightControl').hide();
	} else {
		$('#rightControl').show();
	}
	if(position == numberOfSlides && retour == true){
		currentPosition = 0;
		 $('#leftControl').hide();
	}
  }
  function suivant(){
	$('#rightControl').click();
	}
  function start() {
  	lectureEnCours = true;
    interval = setInterval(suivant, tempsAttente );
  }
  function pause() {
  	lectureEnCours = false;
   clearInterval(interval);
  }
  
 //Si le diapo est activé 
if(lectureAutomatique == true){
  start();
}
if(affichePlayPause == true){

	if(lectureAutomatique == true){
		$('#navDiapo').attr('src',icones['pause']);
	}else{
		$('#navDiapo').attr('src',icones['play']);	
	}
	$('#navDiapo').bind('click', function(){
		if(lectureEnCours == true){
			$(this).attr('src',icones['play']);
			pause();
		}else{
			$(this).attr('src',icones['pause']);
			start();
		}
	});
}


  	
});
{/literal}
</script>

  <!-- Slideshow HTML -->
  <div id="slideshow">
    <div id="slidesContainer" class="border_all">
      <div class="slide">
      <div class="titre">
      <h2>Produit du mois</h2>
      </div>
      <div class="contenu">
		<a href="{$urlsite}{$monthproduct.id_produit|product_link:$monthproduct.nom:$monthproduct.categorie}">
		<img src="{$urlsite}picproduct/{$monthproduct.id_produit}_mini.jpg" alt="" />
		</a>
	<h3><a href="{$urlsite}{$monthproduct.id_produit|product_link:$monthproduct.nom:$monthproduct.categorie}">{$monthproduct.nom|utf8_encode}</a></h3>
		<p class='description'>
		{$monthproduct.description|utf8_encode|truncate:205:"...":true}
		</p>
		</div>
          </div>
       <div class="slide">
             <div class="titre">
        <h2>Nouveautés</h2>
              </div>
      <div class="contenu">

        <a href="http://www.dicoland.com/fr/mecanique/dictionnaire-mecanique-metallurgie-hydraulique-et-industries-connexes-francais-anglais-allemand-index-francais-et-index-allemand-2eme-edition-2010-2914"><img src="http://www.dicoland.com/emailings/1/meca_box.png" alt=""/> </a>
        <a href="http://www.dicoland.com/fr/droit/dictionnaire-juridique-politique-economique-financier-francais-anglais-anglais-francais-2010-5475"><img src="http://www.dicoland.com/emailings/1/katzbox.png" alt="" /></a>
        <a href="http://www.dicoland.com/fr/batiment/vocabulaire-des-travaux-publics-engins-de-chantiers-2010-1574"><img src="http://www.dicoland.com/emailings/1/tpbox.png" alt=""/> </a>
      </div>
                    </div>

      {section name=messages loop=$messages}
      <div class="slide">
      <div class="titre">
        <h2>{$messages[messages].TITRE_MSG|utf8_encode}</h2>
                      </div>
      <div class="contenu">

        <br>
		<h3>{$messages[messages].CONTENU_MSG|utf8_encode|nl2br}</h3>
      </div>
            </div>

      {/section}
      <!--      <div class="slide">
        <h2>Nos prochains titres à paraître :</h2>
        <img src="http://www.dicoland.com/fr/picproduct/1173_mini.jpg" alt="" />
        <img src="http://localhost:8888/web/picproduct/1521_mini.jpg" alt="" />
        <img src="http://localhost:8888/web/picproduct/5396_mini.jpg" alt="" />
   <!--     -glossaire de l’immobilier, 3ème édition bilingue anglais.
			-Orthotypo, 2ème édition, coédition LMD/Quintette
			-glossaire comptable & financier, bilingue anglais  2ème édition bilingue anglais

      </div>-->
      </div>
  </div>
  <!-- Slideshow HTML -->
