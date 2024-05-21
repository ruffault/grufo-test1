<div id='pagefraisport'>
  <h2><span class="deco">></span>Etapa 4 - Forma de envío</h2>

  {if $smarty.session.erreur_fraisport == 1}
  <div id="erreur">
  <h3>Datos incompletos. La información de algunos campos es incorrecta:</h3>
	Elija una forma de transporte.<br />
	</div>
  {/if}

  <form method="post" action="veriffraisport.php">
  <div id="selectport">

    {section name=frais_port loop=$frais_port}
      {if $unique == 1}
			  <input type="hidden" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
      {elseif $smarty.session.fraisport_mode == $frais_port[frais_port].mode}
        <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" checked="checked" />
      {else}
        <input type="radio" name="fraisport_mode" value="{$frais_port[frais_port].mode}" />
      {/if}

      {if $frais_port[frais_port].mode == colissimo_fr}Colissimo seguido (2 días)
      {elseif $frais_port[frais_port].mode == courrier_ordinaire}Correo ordinario (ningún control posible)
      {elseif $frais_port[frais_port].mode == colispostal_prio_a}Paquete postal urgente (ningún control posible, 8 días)
      {elseif $frais_port[frais_port].mode == colispostal_prio_b}Paquete postal urgente (ningún control posible, 8 días)
      {elseif $frais_port[frais_port].mode == colispostal_prio_c}Paquete postal urgente (ningún control posible, 10 días)
      {elseif $frais_port[frais_port].mode == colispostal_prio_d}Paquete postal urgente (ningún control posible, 10 días)
      {elseif $frais_port[frais_port].mode == colispostal_eco_b}Paquete postal económico (ningún control posible, 10 días)
      {elseif $frais_port[frais_port].mode == colispostal_eco_c}Paquete postal económico (ningún control posible, 12 días)
      {elseif $frais_port[frais_port].mode == colispostal_eco_d}Paquete postal económico (ningún control posible, 15 días)
      {elseif $frais_port[frais_port].mode == colissimo_int}Colissimo seguido internacional (4 días)
      {elseif $frais_port[frais_port].mode == colissimo_dom}Colissimo seguido DOM (departamentos franceses de ultramar)(4 días)
      {/if}
      - <strong>{$frais_port[frais_port].prix} €</strong><br />
    {/section}
    <br />
    <input type='submit' name='fraisport_submit' value='ok' />
  </div>
  </form>
</div>
