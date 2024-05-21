<div id='pagefraisport'>
  <h2><span class="deco">></span>Fase 4 - Modalità di spedizione</h2>

  {if $smarty.session.erreur_fraisport == 1}
  <div id="erreur">
  <h3>Informazioni mancanti! Alcuni campi non sono compilati correttamente:</h3>
	E' necessario scegliere un tipo di trasporto.<br />
  </div>
  {/if}

  <form method="post" action="{$urlsite}veriffraisport.php">
  <div id="selectport">

    {section name=frais_port loop=$frais_port}
      {if $unique == 1}
			  <input type="hidden" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
      {elseif $smarty.session.fraisport_mode == $frais_port[frais_port].mode}
        <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" checked="checked" />
      {else}
        <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
      {/if}

      {if $frais_port[frais_port].mode == colissimo_fr}Colissimo suivi (2 giorni)
      {elseif $frais_port[frais_port].mode == courrier_ordinaire}Posta ordinaria (non un seguito possibile)
      {elseif $frais_port[frais_port].mode == colispostal_prio_a}Pacco postale prioritario (non un seguito possibile, 8 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_prio_b}Pacco postale prioritario (non un seguito possibile, 8 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_prio_c}Pacco postale prioritario (non un seguito possibile, 10 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_prio_d}Pacco postale prioritario (non un seguito possibile, 10 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_eco_b}Pacco postale normale (non un seguito possibile, 10 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_eco_c}Pacco postale normale (non un seguito possibile, 12 giorni)
      {elseif $frais_port[frais_port].mode == colispostal_eco_d}Pacco postale normale (non un seguito possibile, 15 giorni)
      {elseif $frais_port[frais_port].mode == colissimo_int}Colissimo suivi Internazionale (4 giorni)
      {elseif $frais_port[frais_port].mode == colissimo_dom}Colissimo suivi Dipartimenti d'oltremare (4 giorni)
      {/if}
      - <strong>{$frais_port[frais_port].prix} €</strong><br />
    {/section}
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>
