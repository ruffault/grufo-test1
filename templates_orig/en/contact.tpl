<div id="contact">
<h2><span class="deco">></span>Contact us</h2>
{if $smarty.get.statut == "fail"}
        <strong>You must send us your e-mail address by writing us a message</strong>
{/if}
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANCE<br /><br />
Tel.: +33 (0) 1 43 22 12 93<br />
Fax: +33 (0) 1 43 22 01 77<br /><br />
Monday to Friday from 10 am to 6 pm and Saturday from 14 am to 6 pm (Paris time)
<br /><br />
E-mail: 
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

{if $smarty.get.statut == "ok"}
        <strong>Thank you, we have received your message. 
        We will reply as soon as possible.</strong>
{else}
  <h2><span class="deco">></span>Direct question</h2>
  <form method="post" action="{$urlsite}question.php">
    <p>
      <label>Your e-mail address</label><input type="text" name="email"
      value="{if isset($smarty.session.email)}{$smarty.session.email}{/if}" />
      <br />
      <label>Message</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Send" />
    </p>
  </form>
{/if}
</div>
