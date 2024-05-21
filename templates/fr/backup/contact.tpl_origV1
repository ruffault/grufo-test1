<?php header ('Content-type: text/html; charset=UTF-8'); ?>
 <div id="contact">
<h2><span class="deco">></span>Contactez nous</h2>
{if $smarty.get.statut == "fail"}
        <strong>Vous devez communiquer votre email et écrire un message</strong>
{/if}
Par courrier :

<div id="adresse" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"> 
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
