<div id='pagefraisport'>
  <h2><span class="deco">></span>Step 4 - Delivery</h2>

  {if $smarty.session.erreur_fraisport == 1}
  <div id="erreur">
  <h3>Information missing! Some fields are incorrectly completed:</h3>
	Please select the transport required.<br />
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

      {if $frais_port[frais_port].mode == colissimo_fr}Colissimo followed (2 days)
      {elseif $frais_port[frais_port].mode == courrier_ordinaire}Ordinary postage (no monitoring)
      {elseif $frais_port[frais_port].mode == colispostal_prio_a}Priority postal package (no monitoring, 8 days)
      {elseif $frais_port[frais_port].mode == colispostal_prio_b}Priority postal package (no monitoring, 8 days)
      {elseif $frais_port[frais_port].mode == colispostal_prio_c}Priority postal package (no monitoring, 10 days)
      {elseif $frais_port[frais_port].mode == colispostal_prio_d}Priority postal package (no monitoring, 10 days)
      {elseif $frais_port[frais_port].mode == colispostal_eco_b}Second class postal package (no monitoring, 10 days)
      {elseif $frais_port[frais_port].mode == colispostal_eco_c}Second class postal package (no monitoring, 12 days)
      {elseif $frais_port[frais_port].mode == colispostal_eco_d}Second class postal package (no monitoring, 15 days)
      {elseif $frais_port[frais_port].mode == colissimo_int}Colissimo followed for International (4 days)
      {elseif $frais_port[frais_port].mode == colissimo_dom}Colissimo followed for French ovserseas departments(4 days)
      {/if}
      - <strong>{$frais_port[frais_port].prix} €</strong><br />
    {/section}
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>
