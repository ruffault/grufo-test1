


<div id='formlivraison'>
  <h2><span class="deco">></span> 2 - Adresse de livraison {if $total_ebook != 0}(pour la partie physique de la commande){/if}</h2>

  <div id="currentadresse">
  {if $infomembre.nomsociete}Société {$infomembre.nomsociete}<br /><br />{/if}
  <strong>
  {if $infomembre.civilite == 1}
    M.
  {elseif $infomembre.civilite == 2}
    Mme
  {elseif $infomembre.civilite == 3}
    Mlle
  {/if}
  
  {$infomembre.nom}
  {$infomembre.prenom}</strong><br />
  {$infomembre.adresse1}<br />
  {if $infomembre.adresse2}{$infomembre.adresse2}<br />{/if}
  {if $infomembre.adresse3}{$infomembre.adresse3}<br />{/if}
  {$infomembre.cp} {$infomembre.ville}<br />
  {$infomembre.pays_membre} {$infomembre.etat}<br /><br />
  <form method="post" action="{$urlsite}verifformlivraison.php">
    <input type="hidden" name="precis" value="0" />
    <input type="image" name="livraison_submit" value="Utiliser cette adresse" src="{$urlsite}lang/{$applicationlang}/img/adresse.gif" />
  </form>
  Ou
  <br />
  <br />
  <form method="post" action="{$urlsite}verifformlivraison.php">
    <input type="hidden" name="premierpassage" value="1" />
    <input type="hidden" name="precis" value="1" />
    <input type="image" name="livraison_submit" value="Utiliser une autre adresse" src="{$urlsite}lang/{$applicationlang}/img/autreadresse.gif" />
  </form>
  </div>
</div>


