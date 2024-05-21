<div id='formfacturation'>
  <h2><span class="deco">></span>Etapa 3 - Dirección facturación</h2>


  <div id="currentadresse">
  {if $infomembre.nomsociete}Empresa {$infomembre.nomsociete}<br /><br />{/if}

  <strong>
  {if $infomembre.civilite == 1}
    Sr.
  {elseif $infomembre.civilite == 2}
    Sra.
  {elseif $infomembre.civilite == 3}
    Srta.
  {/if}
  
  {$infomembre.nom}
  {$infomembre.prenom}</strong><br />
  {$infomembre.adresse1}<br />
  {if $infomembre.adresse2}{$infomembre.adresse2}<br />{/if}
  {if $infomembre.adresse3}{$infomembre.adresse3}<br />{/if}
  {$infomembre.cp} {$infomembre.ville}<br />
  {$infomembre.pays_membre} {$infomembre.etat}<br /><br />
  <form method="post" action="verifformfacturation.php">
    <input type="hidden" name="precis" value="0" />
    <input type="image" name="facturation_submit" value="Utilizar la esta dirección" src="{$urlsite}lang/{$applicationlang}/img/adresse.gif" />
  </form>
  Ou
  <br />
  <br />
  <form method="post" action="verifformfacturation.php">
    <input type="hidden" name="premierpassage" value="1" />
    <input type="hidden" name="precis" value="1" />
    <input type="image" name="facturation_submit" value="Utilizar otra dirección" src="{$urlsite}lang/{$applicationlang}/img/autreadresse.gif" />
  </form>
  </div>
</div>
