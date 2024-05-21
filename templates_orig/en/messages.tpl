{section name=messages loop=$messages}
{cycle values="<table id='messages' width='95%'><tr><td class='titre'>" name=titremessage}
  <span>&nbsp;{$messages[messages].TITRE_MSG|utf8_encode}</span>
  <br />
{cycle values="<tr><td class='contenu'>" name=titremessage}
	<span>{$messages[messages].CONTENU_MSG|utf8_encode|nl2br}</span>
{cycle values="</td></tr>"}	
{cycle values="</td></tr></table><br />"}
{/section}