{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span> 6 - Félicitations</h2>
  <p>
    Vous avez réglé votre commande par carte bancaire.
    Votre commande, référencée <strong>{$smarty.get.commande}</strong>,
    a bien été enregistrée par nos services.
  </p>
  {if $smarty.session.ebook}
  <p>
  <a href='{$urlsite}index.php?page=myaccount'>Vous pouvez accèder à vos ebooks</a>
  La partie de votre commande qui comporterait une livraison peut être suivie comme suit: 
  <p>
  {/if}
  <p>
    A chaque étape de traitement de votre commande, vous allez recevoir
    un email. Vous pouvez suivre, pas à pas, 
    <a href='{$urlsite}index.php?page=oldcommande'>le traitement de votre commande</a>.
    Nous sommes à votre entière disposition, n'hésitez pas à <a href='{$urlsite}index.php?page=contact'>nous poser vos questions.</a>
  </p>

  <p>
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Continuer la visite du catalogue</a>
  </p>
</div>
{/if}
