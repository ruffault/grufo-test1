<div id='pagefraisport'>
  <h2><span class="deco">></span> 4 - Mode d'expédition {if $total_ebook != 0}(pour la partie physique de la commande){/if}</h2>

  {if $smarty.session.erreur_fraisport == 1}
  <div id="erreur">
  <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
	Veuillez choisir un type de transport.<br />
  </div>
  {/if}

  <form method="post" action="{$urlsite}veriffraisport.php">
  <div id="selectport">

    {section name=frais_port loop=$frais_port}
{* j'ajoute le cas 3  ou panier maison de type colissimo donc unique *}
      {if $unique == 1 or $unique == 3}
			  <input type="hidden" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
			{elseif $smarty.session.fraisport_mode == $frais_port[frais_port].mode}
			  <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" checked="checked" />
      {else}
        <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
      {/if}

      {if $frais_port[frais_port].mode == colissimo_fr}Colissimo suivi (délai indicatif : 2 jours)
      {elseif $frais_port[frais_port].mode == courrier_ordinaire }Courrier ordinaire <br> (<span style="color:red;font-weight:bold">Attention pas de possibilité de suivi en courrier ordinaire</span>)
      {elseif $frais_port[frais_port].mode == colispostal_prio_a}Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 8 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_prio_b}Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 8 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_prio_c}Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_prio_d}Colis postal prioritaire (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_eco_b}Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 10 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_eco_c}Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 12 jours</span>)
      {elseif $frais_port[frais_port].mode == colispostal_eco_d}Colis postal économique (<span style="color:red;font-weight:bold">pas de suivi possible, délai indicatif : 15 jours</span>)
      {elseif $frais_port[frais_port].mode == colissimo_int}Colissimo suivi international (délai indicatif : 4 jours)
      {elseif $frais_port[frais_port].mode == colissimo_dom}Colissimo DOM suivi (délai indicatif : 4 jours)
      {/if}
      - <strong>{$frais_port[frais_port].prix} €</strong><br />
    {/section}
{* j'ajoute la phrase qui souligne la gratuité proposée *}
    
    {if $unique == 2}
             <br />      
             <span style="color:green;font-weight:bold">Merci d'avoir choisi un de nos livres, vous bénéficiez de la gratuité, continuez vos achats pour avoir la gratuité en Colissimo</span>
    {/if}
    {if  $unique == 3}
    <br />
             <span style="color:blue;font-weight:bold">Merci d'avoir choisi un de nos livres et de votre belle commande. Cela vous permet de bénéficier de la gratuité en Colissimo.</span>
    {/if}

    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>
