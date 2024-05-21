<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:21
         compiled from de/aide.tpl */ ?>
<div id='aideenligne'>
<h2><span class="deco">></span>Online-Hilfe</h2>

<h3><span class="deco">></span><a href="#commentfonctionne">Wie funktioniert die Schnittstelle?</a></h3>
<ul>
<li><a href='#moncompte'>Mein Konto: Einrichten, Ändern, Bestellungen verfolgen</a></li>
<li><a href='#recherche'>Einfache Suche und erweiterte Suche</a></li>
<li><a href='#catalogue'>Katalog</a></li>
<li><a href='#detail'>Buchdetails</a></li>
</ul>

<h3><span class="deco">></span><a href="#commentcommander">Wie bestelle ich ?</a></h3>
<ul>
<li><a href='#panier'>Artikel suchen und in den Warenkorb legen</a></li>
<li><a href='#passer'>Bestellung aufgeben</a></li>
<li><a href='#suivre'>Bestellung verfolgen</a></li>
</ul>

<h3><span class="deco">></span><a href='#paiement'>Sicher bezahlen</a></h3>

<h3><span class="deco">></span><a href='#quisommenous'>Über uns</a></h3>

<h3><span class="deco">></span><a href="#nouscontacter">Wie Sie uns erreichen</a></h3>

<h3><span class="deco">></span><a href='#faq'><acronym title='Frequently Asked Question'>FAQ</acronym> (Häufig gestellte Fragen)</a></h3>
<ul>
<li><a href='#passperdu'>Was tun, wenn ich mein Passwort verloren oder vergessen habe?</a></li>
</ul>
<br /><br /><br /><br />
<h2 id="commentfonctionne"><span class="deco">></span>Wie funktioniert die Schnittstelle?</h2>
<h3 id="moncompte"><span class="deco">></span>Mein Konto</h3>
<p>Richten Sie am besten gleich Ihr eigenes Konto bei dicoland.com ein.
Nach der Anmeldung <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php'>können Sie Ihre Bestellungen </a>
schneller freigeben, den Inhalt Ihres <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier'>Warenkorb abspeichern</a> und auf Wunsch unseren Infobrief abonnieren.</p>
<p>Sobald Sie Ihre erste Bestellung aufgegeben haben, sind Sie bei Dicoland.com angemeldet.
Danach können Sie sich mit Ihrem Pseudonym und Passwort jederzeit bei  
Dicoland.com einloggen. So können Sie unter <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">Ihre Bestellungen verfolgen</a> die Bearbeitung Ihrer Bestellungen 
kontrolliern und sich einen Überblick über Ihre früheren Einkäufe verschaffen.</p>
<p>In der Rubrik "Vorzugseinstellungen ändern" können Sie außerdem Ihre persönliche Angaben und Ihr Passwort ändern. 
Sie können sich dort auch als Empfänger für unseren Infobrief anmelden.</p>
<p>Wenn Sie sich nicht sofort anmelden möchten, können Sie trotzdem weiter auf   
Dicoland.com surfen und Artikel in den Warenkorb legen.</p>

<h3 id="recherche"><span class="deco">></span>Einfache Suche und erweiterte Suche</h3>
<p>Für Suchvorgänge bietet Dicoland.com Ihnen 2 Möglichkeiten.</p>
<ul>
<li><strong>Schnellsuche</strong>
<p>Die Schnellsuche finden Sie in der orangefarbenen Leiste oben auf der Seite.
Damit können Sie eine annäherende Suche nach Buchtitel und/oder Autor oder Thema starten.
Dieser Suchvorgang liefert die meisten Ergebnisse.
</p></li>
<li><strong>Erweiterte Suche</strong>
<p>Die erweiterte Suche ist über den Link <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>Erweiterte Suche</a>
rechts neben der Schnellsuche in der orangefarbenen Leiste oben auf der Seite zugänglich. 
Dort können Sie Ihre Suche durch Festlegung verschiedener Kriterien wie Titel, Thema, Autor oder 
Sprache genauer umreissen. 

</p>
</li>
</ul>
<p>
Nach dem Start der Suche wird die Seite mit den Suchergebnissen eingeblendet.
Die Themen oder Kategorien, die den gewünschten Kriterien entsprechen, werden in der 
Box "Kategorien" rechts neben der Liste der Suchergebnisse angezeigt.</p>
</div>
<h3 id='catalogue'><span class="deco">></span>Katalog</h3>
<p>
Im <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html'>Katalog</a> können Sie Artikel nach 
Themen suchen. Er ist mehrschichtig aufgebaut mit Zugriffsmöglichkeit auf Haupt- und 
Unterkategorien. 
Per Mausklick auf einen der Links oben im Katalog gelangen Sie von einer Unterkategorie  
zur nächsthöheren Kategorie. 
Über den Link <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html">Katalog</a>.</p> können Sie auch direkt
zur Hauptseite des Katalogs zurückgehen.

<h3 id="detail"><span class="deco">></span>Buchdetails</h3>
<p>Für jeden gewählten Artikel können folgende Informationen angezeigt werden:</p>
<ul>

<li>Autor
<p>Hier ist der Name des Autors aufgeführt. 
Falls es mehrere Titel von dem gleichen Autor gibt, werden diese weiter unten 
in der Rubrik "Vom gleichen Autor" aufgelistet. 
Über die dazugehörigen Links können Sie sich die betreffenden Werke ansehen.</p></li>

<li>Thema
<p>Das Thema entspricht der dem Artikel zugeordneten Katalogkategorie. Alle Werke
zum gleichen Thema sind in der Rubrik "In der gleichen Kategorie" unter 
"Vom gleichen Autor" aufgeführt.</p></li>

<li>Artikelnummer
<p>Die Artikelnummer ist die Dicoland.com-interne Kennung zur Unterscheidung von 
anderen Artikeln.</p></li>

<li>Lieferbarkeit<p>Bei vorrätigen Büchern erscheint der Hinweis "lieferbar".
Bei nicht sofort lieferbaren Titeln, erscheint die Angabe der Lieferfrist.</p></li>

<li>Verlagspreis
<p>Der vom Verleger für das Buch festgelegte Preis. 
</p></li>

<li>Preisnachlass
<p>Auf bestimmte Titel gibt es einen Preisnachlass. 
Die Berechnung des Preisnachlasses wird angezeigt.</p></li>

<li>Verkaufspreis
<p>Der Dicoland.com-Verkaufspreis für das betreffende Buch. 
Wie alle unsere Preise kann dieser Preis sich aufgrund bestimmter Ereignisse 
oder Situationen ändern (siehe rechtliche Hinweise).
Für Privat- wie für Firmenkäufer gelten die gleichen
<acronym  title="Hors taxes">Nettopreise</acronym>
und <acronym title="Toute taxes comprises">Preise einschl. MwSt</acronym>. 
</p></li>

<li>Cover
<p>Fast alle Buchcover können als Bild angezeigt werden. 
Per Mausclick können Sie das Bild zoomen und so in vergrößter Ansicht anzeigen.
</p></li>

<li>Beschreibung
<p>Eine Beschreibung bzw. Zusammenfassung des Buches für einen ersten
Einblick vor dem Kauf.</p></li>

<li>Sonstiges
<p>Hier finden Sie diverse Zusatzinformationen, z.B. ob es eine Beilage zu
dem Buch gibt, ob das Buch Teil einer Serie ist u.ä.</p></li>

<li>Anzahl der Seiten und Einträge  
<p>Diesen beiden Angaben vermitteln Ihnen einen Überblick über den Umfang des Buchs.
</p></li>

<li>Sprachen
<p>Hinweis auf die in dem Buch behandelten Sprachen und Übersetzungsrichtungen.
</p></li>

<li>Index
<p>Hinweis auf den Index, falls vorhanden.</p></li>

<li>Schaltfläche <em>In den Warenkorb</em>
<p>Mit dieser Schaltfläche können Sie das gewählte Buch in Ihren Warenkorb legen.
</p></li>
</ul>


<h2 id="commentcommander"><span class="deco">></span>Wie bestelle ich?</h2>
<h3 id="panier"><span class="deco">></span>Titel suchen und in den Warenkorb legen
</h3>
<p>Um Bücher in den Warenkorb zu legen, klicken Sie einfach auf die Schaltfläche 
"In meinen Warenkorb", die jeweils mit der Detailansicht der gewünschten 
Artikel eingeblendet wird.<br />
Nach Artikeln suchen können Sie auf der Hauptseite, im Katalog oder anhand der 
auf bestimmten Datenblättern vorhandenen Links.
</p>
<p>
Anschließend können Sie sich den Inhalt Ihres Warenkorbs ansehen und nach Wunsch
gestalten.
Sie können z.B. die Menge der gewünschten Bücher ändern, indem Sie die Zahl in dem 
dazu bestimmten Feld überschreiben und auf "Ändern" klicken. 
Oder durch Eingabe von 0 und Mausklick auf die Schaltfläche einen bereits ausgesuchten 
Artikel wieder herausnehmen.</p>

<p>Wenn Sie Artikel für eine spätere Bestellung beiseite legen möchten, klicken
Sie auf die Schaltfläche "Auf den Merkzettel schreiben". Die beiseite gelegten 
Artikel werden dadurch auf den "Merkzettel" unter dem Warenkorb gesetzt.  

Wenn Sie einen Artikel vom Merkzettel auswählen möchten, klicken Sie einfach auf 
die Schaltfläche "In den Warenkorb". </p>

<h3 id="passer"><span class="deco">></span>Bestellen</h3>

<p>Wenn Sie eine Bestellung aufgeben möchten, klicken Sie direkt auf <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php">
Geben Sie Ihre Bestellung </a> im Warenkorb oder auf der Menüleiste
rechts im Bildschirm frei. 
Wenn Sie noch nicht bei Dicoland.com angemeldet sind, wird ein Anmeldeformular
zur Eingabe Ihrer persönlichen Daten eingeblendet. 
Anschließend müssen Sie die gewünschte Lieferadresse eingeben. 
Für die Rechnungszustellung können Sie auf Wunsch eine andere Anschrift angeben.
Geben Sie danach die gewünschte Versandart (Express- oder Eco-Versand)
an.  
Ihre Bestellung ist jetzt fast fertig. Sie müssen jetzt nur noch die Zahlungsart
wählen und die angezeigten Anweisungen befolgen.<br />
Als Bestätigung für Ihre Bestellung erhalten Sie eine E-Mail. </p>

<h3 id="suivre"><span class="deco">></span>Bestellung verfolgen</h3>

<p>Nach der Bestellungsaufgabe werden Sie über jeden Schritt der 
Bestellungsbearbeitung informiert.<br />
Zunächst überprüft Dicoland.com die Gültigkeit Ihrer Bestellung. Wenn die Bestellung
fehlerfrei ist, wird sie angenommen. Bei Erhalt der Zahlung wird Ihre Bestellung
bei Dicoland.com fertig gemacht und verschickt.<br />
Sie werden über jeden Schritt per E-Mail benachrichtigt. Darüber hinaus können Sie
den Bearbeitungsstand Ihrer Bestellung auch direkt bei Dicoland.com in der Rubrik
"Mein Konto" unter "Meine Bestellungen online verfolgen" überprüfen.
Auf dieser Seite können Sie auch die Details Ihrer Bestellungen und den Stand 
der Vorbereitungen einsehen. 
</p>

<h2 id="paiement"><span class="deco">></span>Sicher zahlen</h2>
<p>Für eine risikofreie Zahlung leitet Dicoland.ocm Sie bei Kartenzahlung
an den sicheren Online-Zahlungsdienst der CIC-Bank weiter. 
Dicoland.com erhält somit keinerlei Kenntnis von Ihren persönlichen Bankverbindungen.
Die Zahlung über den sicheren Server der Bank erfolgt ausschließlich anhand
verschlüsselter Informationen. Dass die Transaktion sicher ist, können Sie auch
an dem kleinen Vorhängeschloss in der Zustandleiste des Navigators erkennen.</p>

<h2 id="nouscontacter"><span class="deco">></span>Wie Sie uns erreichen können</h2>
<p>Ganz einfach auf direktem Wege.<br />Benutzen Sie das dazu vorgesehene
Formular in der Rubrik <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>Kontakt</a>. 
Wir beantworten Ihre Anfrage umgehend. Sie können uns auch telefonisch unter
+33 (0) 1 43 22 12 93 oder per Fax unter +33 (0) 1 43 22 01 77 erreichen.
</p>

<h3 id="faq"><span class="deco">></span><acronym title='Frequently Asked Question'>FAQ</acronym> (Questions Fréquemment Posées)</h3>
<h4 id="passperdu"><span class="deco">></span>Was tun, wenn ich mein Passwort verloren
oder vergessen habe?</h4>
<p>
 Um ein neues Passwort, das Sie später ändern können, zugewiesen zu bekommen, 
 benutzen Sie bitte das Formular <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass"> zur Passwort-Neuvergabe</a>. 
 Geben Sie dort die bei Ihrer Anmeldung genannte E-Mail-Adresse ein.<br />
  Daraufhin wird Ihnen ein neues Passwort zugewiesen, mit dem Sie sich sofort 
  auf Dicoland.com einloggen können.
  </p>