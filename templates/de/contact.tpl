<div id="contact">
<h2><span class="deco">></span>Kontakt</h2>
{if $smarty.get.statut == "fail"}
        <strong>Teilen Sie uns Ihre E-Mail-Adresse mit und schicken Sie uns eine Nachricht</strong>
{/if}
<p id="adresse">
<strong>La Maison du Dictionnaire</strong><br />
98, Bd du Montparnasse<br />
F-75014 PARIS<br />
FRANKREICH<br /><br />
Tel. +33 (0) 1 43 22 12 93<br />
Fax +33 (0) 1 43 22 01 77<br /><br />
Montags bis freitags von 10:00 bis 18:00 Uhr,
samstags von 14:00 bis 18:00 Uhr (Ortszeit)<br /><br />
E-Mail: 
<a href="mailto:service-client@dicoland.com">service-client@dicoland.com</a>
</p>

{if $smarty.get.statut == "ok"}
        <strong>Vielen Dank für Ihre Nachricht.  
        Wir bearbeiten Ihre Anfrage so schnell wie möglich.</strong>
{else}
  <h2><span class="deco">></span>Online-Anfrage</h2>
  <form method="post" action="{$urlsite}question.php">
    <p>
      <label>Ihre E-Mail</label><input type="text" name="email"
      value="{if isset($smarty.session.email)}{$smarty.session.email}{/if}" />
      <br />
      <label>Nachricht</label><textarea rows="7" name="message" id="message"></textarea>
      <br />
      <input type="submit" value="Senden" />
    </p>
  </form>
{/if}
</div>
