<div id='formfacturation'>
  <h2><span class="deco">></span>Fase 3 - Indirizzo per la fatturazione</h2>


  <div id="currentadresse">
  {if $infomembre.nomsociete}Azienda {$infomembre.nomsociete}<br /><br />{/if}

  <strong>
  {if $infomembre.civilite == 1}
    Sig.
  {elseif $infomembre.civilite == 2}
    Sig.ra
  {elseif $infomembre.civilite == 3}
    Sig.ina
  {/if}
  
  {$infomembre.nom}
  {$infomembre.prenom}</strong><br />
  {$infomembre.adresse1}<br />
  {if $infomembre.adresse2}{$infomembre.adresse2}<br />{/if}
  {if $infomembre.adresse3}{$infomembre.adresse3}<br />{/if}
  {$infomembre.cp} {$infomembre.ville}<br />
  {$infomembre.pays_membre} {$infomembre.etat}<br /><br />
  <form method="post" action="{$urlsite}verifformfacturation.php">
    <input type="hidden" name="precis" value="0" />
    <input type="image" name="facturation_submit" value="Usa questo indirizzo" src="{$urlsite}lang/{$applicationlang}/img/adresse.gif" />
  </form>
  Ou
  <br />
  <br />
  <form method="post" action="{$urlsite}verifformfacturation.php">
    <input type="hidden" name="premierpassage" value="1" />
    <input type="hidden" name="precis" value="1" />
    <input type="image" name="facturation_submit" value="Usa un altro indirizzo" src="{$urlsite}lang/{$applicationlang}/img/autreadresse.gif" />
  </form>
  </div>
</div>
