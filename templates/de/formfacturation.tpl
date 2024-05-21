<div id='formfacturation'>
  <h2><span class="deco">></span>Schritt 3 - Rechnungsadresse</h2>


  <div id="currentadresse">
  {if $infomembre.nomsociete}Firma {$infomembre.nomsociete}<br /><br />{/if}

  <strong>
  {if $infomembre.civilite == 1}
    Herr
  {elseif $infomembre.civilite == 2 or $infomembre.civilite == 3}
    Frau
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
    <input type="image" name="facturation_submit" value="Diese Adresse benutzen" src="{$urlsite}lang/{$applicationlang}/img/adresse.gif" />
  </form>
  Oder
  <br />
  <br />
  <form method="post" action="{$urlsite}verifformfacturation.php">
    <input type="hidden" name="premierpassage" value="1" />
    <input type="hidden" name="precis" value="1" />
    <input type="image" name="facturation_submit" value="Eine andere Adresse benutzen" src="{$urlsite}lang/{$applicationlang}/img/autreadresse.gif" />
  </form>
  </div>
</div>
