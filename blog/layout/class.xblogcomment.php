<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2004 Olivier Meunier and contributors. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****

#
# Extension de la classe blogcomment

class xblogcomment extends blogcomment
{
	# Extraction des trackbacks dans un autre recordset
	function extractTrackbacks()
	{
		$res = array();
		foreach ($this->arry_data as $k => $v)
		{
			if ($v['comment_trackback'] == 1) {
				$res[] = $v;
				unset($this->arry_data[$k]);
			}
		}
		
		$this->recordSet(array_values($this->arry_data));
		
		$rs = new xblogcomment($res);
		$rs->setBlog($this->blog);
		return $rs;
	}
	
	function auteurLink()
	{
		if($this->f('comment_email') != '') {
			return $this->getEncodMail();
		} else {
			return false;
		}
	}
	
	function auteurSite()
	{
		if($this->f('comment_site') != '') {
			return 'http://'.$this->f('comment_site');
		} else {
			return false;
		}
	}
	
	function xGetContent()
	{
		if ($this->blog->use_smilies)	{
			return $this->blog->addSmilies($this->getContent());
		} else {
			return $this->getContent();
		}
	}
	
	function getRSSSeq()
	{
		return '  <rdf:li rdf:resource="'.$this->getPermURL().'" />'."\n";
	}
	
	function getRSSItem()
	{
		$tb = (boolean) $this->f('comment_trackback');
		
		$desc = util::cutString(strip_tags($this->getContent()),300).'...';
		
		return
		'<item rdf:about="'.$this->getPermURL().'">'."\n".
		'  <title>'.($tb ? 'trackback - ' : '').
		$this->blog->toXML($this->f('post_titre')).' - '.
		$this->blog->toXML($this->f('comment_auteur'))."</title>\n".
		'  <link>'.$this->getPermURL()."</link>\n".
		'  <dc:date>'.$this->getIsoDate()."</dc:date>\n".
		'  <dc:creator>'.htmlspecialchars($this->f('comment_auteur'))."</dc:creator>\n".
		'  <description>'.$this->blog->toXML($desc)."</description>\n".
		'  <content:encoded><![CDATA['.$this->getContent()."]]></content:encoded>\n".
		'</item>'."\n";
	}
	
	function getAtomEntry()
	{
		$tb = (boolean) $this->f('comment_trackback');
		
		return
		'<entry>'."\n".
		'  <title>'.($tb ? 'trackback - ' : '').
		$this->blog->toXML($this->f('post_titre')).' - '.
		$this->blog->toXML($this->f('comment_auteur'))."</title>\n".
		'  <link rel="alternate" type="text/html" href="'.$this->getPermURL().'"/>'."\n".
		'  <issued>'.$this->getIsoDate()."</issued>\n".
		'  <modified>'.$this->getIsoDate()."</modified>\n".
		'  <id>'.$this->getPermURL()."</id>\n".
		'  <author><name>'.htmlspecialchars($this->f('comment_auteur'))."</name></author>\n".
		'  <content type="text/html" mode="escaped">'.
		htmlspecialchars($this->getContent())."</content>\n".
		'</entry>'."\n";
	}
}


?>
