{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Informations manquantes</h2>
  <p>
    Notre service bancaire nous a informé que le paiement n'a pas pu être honoré.
    Par conséquent, nous avons le regret de vous informer que votre commande,
    référencée <strong>{$smarty.get.commande}</strong> ne sera pas traitée.
  </p>
 
  <p>
    Nous restons cependant à votre entière disposition, n'hésitez pas à 
    <a href='{$urlsite}index.php?page=contact'>nous poser vos questions.</a>
  </p>
  <p>
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Continuer la visite du catalogue</a>
  </p>
</div>
{/if}
