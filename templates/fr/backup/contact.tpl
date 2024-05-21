<?php header ('Content-type: text/html; charset=UTF-8'); ?>
 <div id="contact">
<h2><span class="deco">></span>Contactez nous</h2>
{if $smarty.get.statut == "fail"}
        <strong>Vous devez communiquer votre email et écrire un message</strong>
{/if}
Par courrier :

<div id="adresse" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress"> 
<span itemprop="name"><strong>La Maison du Dictionnaire</strong></span><br />
<span itemprop="streetAddress">98, Bd du Montparnasse</span> 		<br />
<span itemprop="postalCode">75014</span> <span itemprop="addressLocality">PARIS</span> <br />	
<span itemprop="addressCountry">FRANCE</span> 
</div>

<br />
Par téléphone :
<p id="adresse">Du lundi au vendredi de <strong>10h à 13h et de 14h à 18h </strong>
et le samedi de<strong> 14h à 18h </strong>
<br />
Tél. : +33 (0) 1 43 22 12 93</p>

Par fax :
<p id="adresse">Télécopie : +33 (0) 1 43 22 01 77<br /></p>

Par e-mail : 
<p id="adresse"><a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>
<p id="adresse"><a href="mailto:contacts@dicoland.com">contacts@dicoland.com</a></p>

<h2><span class="deco">></span>Nous rendre visite</h2>

<p id="adresse">
Du lundi au vendredi de 10h à 13h et de 14h à 18h 
et le samedi de 14h à 18h <br />
<br />
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse
<br /> Face &agrave l'entr&eacutee des cin&eacutemas Les Sept Parnassiens <br />

F-75014 PARIS<br />
FRANCE<br />

</p>
<div id="map"></div>

{literal}
<script>
var map;
function initMap() {
	var dico = {lat: 48.842609, lng: 2.327886};
	map = new google.maps.Map(document.getElementById('map'), {
		center: dico,
		zoom: 15
	});
	var marker = new google.maps.Marker({
		position : dico,
		label: 'La Maison du Dictionnaire',
		map: map,
		draggable: true,
		animation: google.maps.Animation.DROP,
		title: 'On sera vraiment très heureux de vous recevoir!'
	});
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN6Z9M2PSH9BLgEN331zbfhCnzfdUeV-E&callback=initMap"
async defer></script>
{/literal}
<h2><span class="deco">><a href="https://www.google.com/maps/place/La+Maison+du+Dictionnaire/@48.8424433,2.3254505,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x499dff5ad3ca41b3!8m2!3d48.8424398!4d2.3276392?hl=fr-FR">A pied ou en voiture  pour savoir comment venir chez nous c'est ici</a></span></h2>
{if $smarty.get.statut == "ok"}
        <strong>Nous avons bien reçu votre  message et vous en remercions. 
        Nous vous répondrons dans les plus brefs délais.</strong>
{else}
  <h2><span class="deco">></span>Question en direct</h2>
  <form method="post" action="{$urlsite}question.php">
    <p>
      <label>Votre email</label><input type="text" name="email"
      value="{if isset($smarty.session.email)}{$smarty.session.email}{/if}" />
      <br />
      <label>Message</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Envoyer" />
    </p>
  </form>
{/if}
</div>
