<div id="catalogue">

{if $smarty.get.idcat ne 0}
<h2>
    <span class="deco">></span>
    <span id='current'>
      <a href="{$urlsite}dictionnaire-et-lexique-c0">Catalogue</a>
      {section name=uppercat loop=$uppercat}
      	&#062; <a href="{$urlsite}{$uppercat[uppercat].id|categ_link:$uppercat[uppercat].nom}">{$uppercat[uppercat].nom|utf8_encode}</a>
      {/section}
    </span>
</h2>
  {if $categorie_precise}
  <div id="categ">
    <table>
    <tr>
    {section name=categorie_precise loop=$categorie_precise}
      {if $categorie_total > 30}
        {cycle name="plop2" values="<td><ul>,,,,,,,,,,,,,,,,,"}
      {elseif $categorie_total > 20}
        {cycle name="plop2" values="<td><ul>,,,,,,,,,,,,,"}
      {elseif $categorie_total > 10}
        {cycle name="plop2" values="<td><ul>,,,,,"}
      {elseif $categorie_total > 6}
        {cycle name="plop2" values="<td><ul>,,"}
      {else}
        {cycle name="plop2" values="<td><ul>,,,"}
      {/if}
      
      	<li><a href="{$urlsite}{$categorie_precise[categorie_precise].id|categ_link:$categorie_precise[categorie_precise].nom}">{$categorie_precise[categorie_precise].nom|utf8_encode}</a></li>
      {if $categorie_total > 30}
        {cycle name="plop" values=",,,,,,,,,,,,,,,,,</ul></td>"}
      {elseif $categorie_total > 20}
        {cycle name="plop" values=",,,,,,,,,,,,,</ul></td>"}
      {elseif $categorie_total > 10}
        {cycle name="plop" values=",,,,,</ul></td>"}
      {elseif $categorie_total > 6}
        {cycle name="plop" values=",,</ul></td>"}
      {else}
        {cycle name="plop" values=",,,</ul></td>"}
      {/if}

    {/section}
    </tr>
    </table>
  </div>
  {/if}
{else}
  {if !$notitle}
    <h2><span class="deco">></span>Catalogue</h2>
  {/if}
  <table id="tabcatalogue">
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}abreviations-c1">Abbreviations</a></h3>
    <a href="{$urlsite}sigles-c256">Acronyms</a>
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langues-d-asie-et-proche-orient-oceanie-c303">Languages of Asia and the Middle East - Oceania</a></h3>
    <a href="{$urlsite}arameen-c23">Aramean</a>, <a href="{$urlsite}chinois-c65">Chinese</a>, <a href="{$urlsite}laotien-c167">Laotian</a> etc.
		<a href="{$urlsite}langues-d-asie-et-proche-orient-oceanie-c303">(See more)
		</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}administration-et-gestion-de-l-entreprise-c308">Business administration and management</a></h3>
    <a href="{$urlsite}communautes-europeennes-c70">European communities</a>, <a href="{$urlsite}economie-c103">Economy</a>, <a href="{$urlsite}management-c181">Management</a> etc.
		<a href="{$urlsite}administration-et-gestion-de-l-entreprise-c308">(See more)
		</a>  
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langues-europeennes-europe-de-l-est-c300">European and East European languages</a></h3>
    <a href="{$urlsite}croate-c87">Croatian</a>, <a href="{$urlsite}grec-c137">Greek</a>, <a href="{$urlsite}irlandais-c153">Irish</a> etc.
		<a href="{$urlsite}langues-europeennes-europe-de-l-est-c300">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}batiment-travaux-publics-c305">Buildings and public works sector</a></h3>
    <a href="{$urlsite}architecture-c24">Architecture</a>, <a href="{$urlsite}domotique-c98">Home automation</a>, <a href="{$urlsite}mecanique-des-sols-c191">Soil mechanics</a> etc.
		<a href="{$urlsite}batiment-travaux-publics-c305">(See more)</a>
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langues-indiennes-c301">Indian languages</a></h3>
    <a href="{$urlsite}hindi-c140">Hindi</a>, <a href="{$urlsite}nepali-c203">Nepali</a>, <a href="{$urlsite}tibetain-c279">Tibetan</a> etc.
		<a href="{$urlsite}langues-indiennes-c301">(See more)</a>  
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}dictionnaires-electroniques-c312">Digital Dictionaries</a></h3>
    <a href="{$urlsite}dictionnaires-electroniques-c312">Electronics dictionaries</a>, <a href="{$urlsite}E-Book-c351">E-Book</a>, <a href="{$urlsite}cd-rom-c59">CD-ROM</a>, <a href="{$urlsite}logiciel-c174">Software</a> etc.
		<a href="{$urlsite}dictionnaires-electroniques-c312">(See more)</a>  
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langues-regionales-de-france-c299">Regional languages of France</a></h3>
    <a href="{$urlsite}alsacien-c12">Alsation</a>, <a href="{$urlsite}occitan-c208">Occitan</a>, <a href="{$urlsite}savoyard-c250">Savoyard</a> etc.
		<a href="{$urlsite}langues-regionales-de-france-c299">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}dictionnaires-techniques-generaux-c304">General technical dictionaries</a></h3>
    <a href="{$urlsite}anglais-technique-c19">Technical English</a>, <a href="{$urlsite}espagnol-technique-c116">Technical Spanish</a>, <a href="{$urlsite}francais-technique-c125">Technical French</a> etc.
		<a href="{$urlsite}dictionnaires-techniques-generaux-c304">(See more)</a>
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}sciences-de-la-terre-c309">Earth sciences</a></h3>
    <a href="{$urlsite}botanique-c50">Botany</a>, <a href="{$urlsite}geographie-c133">Geography</a>, <a href="{$urlsite}geologie-c134">Geology</a> etc.
		<a href="{$urlsite}sciences-de-la-terre-c309">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}industries-chimiques-c306">Chemical industries</a></h3>
    <a href="{$urlsite}cosmetiques-c78">Cosmetics</a>, <a href="{$urlsite}imprimerie-c149">Printers</a>, <a href="{$urlsite}textile-c277">Textile</a> etc.
		<a href="{$urlsite}industries-chimiques-c306">(See more)</a>  
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}sciences-de-la-vie-c310">Life sciences</a></h3>
    <a href="{$urlsite}agro-alimentaire-c7">Agri-foodstuffs</a>, <a href="{$urlsite}genetique-c131">Genetics</a>, <a href="{$urlsite}zoologie-c297">Zoology</a> etc.
		<a href="{$urlsite}sciences-de-la-vie-c310">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}industries-diverses-c307">Miscellaneous industries</a></h3>
    <a href="{$urlsite}arts-spectacles-c28">Arts-Entertainment</a>, <a href="{$urlsite}sports-c262">Sports</a>, <a href="{$urlsite}tourisme-c283">Tourism</a> etc.
		<a href="{$urlsite}industries-diverses-c307">(See more)</a>
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}sciences-physiques-c311">Physical sciences</a></h3>
    <a href="{$urlsite}chimie-c64">Chemistry</a>, <a href="{$urlsite}electronique-c108">Electronics</a>, <a href="{$urlsite}optique-c209">Optics</a> etc.
		<a href="{$urlsite}sciences-physiques-c311">(See more)</a> 
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langue-francaise-c166">French language</a></h3>
    <a href="{$urlsite}analogie-francais-c16">Analogy</a>, <a href="{$urlsite}etymologie-francais-c119">Etymology</a>, <a href="{$urlsite}linguistique-francais-c170">Linguistics</a> etc.
		<a href="{$urlsite}langue-francaise-c166">(See more)</a> 
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}terminologie-c275">Terminology</a></h3>
    <a href="{$urlsite}divers-c95">Miscellaneous</a> etc.
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}langues-africaines-c302">African languages</a></h3>
    <a href="{$urlsite}afrikaans-c5">Afrikaans</a>, <a href="{$urlsite}swahili-c266">Swahili</a>, <a href="{$urlsite}wolof-c294">Wolof</a> etc.
		<a href="{$urlsite}langues-africaines-c302">(See more)</a>
  </td>
  <td>
    <h3><img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}transports-c285">Transport</a></h3>
    <a href="{$urlsite}aeronautique-c4">Aeronautics</a>, <a href="{$urlsite}automobile-c31">Automobile</a>, <a href="{$urlsite}marine-c184">Marine</a> etc.
		<a href="{$urlsite}transports-c285">(See more)</a>
  </td>
  </tr>
  </table>
  
{*
  {section name=categorie loop=$categorie}
  	 <h3><a href="{$urlsite}catalogue-{$categorie[categorie].id}-a.html">{$categorie[categorie].nom|utf8_encode}</a></h3>
      {section name=subcateg loop=$subcateg}
        {if $subcateg[subcateg].parent == $categorie[categorie].id}
    	   <h4><a href="{$urlsite}catalogue-{$subcateg[subcateg].id}-a.html">{$subcateg[subcateg].nom|utf8_encode}</a></h4>
        {/if}
      {/section}
  {/section}
*}
</div>

<div id="catalogue">
{if $show_liste_editeurs_dans_catalogue}
<h2><span class="deco">></span>Catalogue by editor</h2><br />
    <table>
      {section name=tab_editeurs loop=$tab_editeurs}
		  <tr>
		  <td>
       <img src="{$urlsite}css/puce2.gif" alt="" /> <a href="{$urlsite}catalogue-editeur-{$tab_editeurs[tab_editeurs].nom}-e{$tab_editeurs[tab_editeurs].id_editeur|urlencode}"><b>{$tab_editeurs[tab_editeurs].nom|utf8_encode|strtolower|ucwords}</b></a>
       {if $show_details == "1"} ({$tab_editeurs[tab_editeurs].nbr_online_products} produits){/if}
       <br />
      </td>  
			</tr>
      {/section}
    </table>
{/if}
{/if}
</div>