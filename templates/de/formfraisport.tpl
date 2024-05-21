<div id='pagefraisport'>
  <h2><span class="deco">></span>Schritt 4 - Versandart</h2>

  {if $smarty.session.erreur_fraisport == 1}
  <div id="erreur">
  <h3>Fehlende Angaben! Einige Felder sind unvollständig ausgefüllt:</h3>
	Wählen Sie die gewünschte Transportart.<br />
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

      {if $frais_port[frais_port].mode == colissimo_fr}Colissimo gefolgt (binnen 2 Tagen)
      {elseif $frais_port[frais_port].mode == courrier_ordinaire}Gewöhnliche Post (keine mögliche Weiterverfolgung)
      {elseif $frais_port[frais_port].mode == colispostal_prio_a}Express (keine mögliche Weiterverfolgung, binnen 8 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_prio_b}Express (keine mögliche Weiterverfolgung, binnen 8 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_prio_c}Express (keine mögliche Weiterverfolgung, binnen 10 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_prio_d}Express (keine mögliche Weiterverfolgung, binnen 10 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_eco_b}Eco (keine mögliche Weiterverfolgung, binnen 10 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_eco_c}Eco (keine mögliche Weiterverfolgung, binnen 12 Tagen)
      {elseif $frais_port[frais_port].mode == colispostal_eco_d}Eco (keine mögliche Weiterverfolgung, binnen 15 Tagen)
      {elseif $frais_port[frais_port].mode == colissimo_int}Colissimo internationale gefolgt (binnen 4 Tagen)
      {elseif $frais_port[frais_port].mode == colissimo_dom}Colissimo in Überseee-Départements gefolgt (binnen 4 Tagen)
      {/if}
      - <strong>{$frais_port[frais_port].prix} €</strong><br />
    {/section}
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>
