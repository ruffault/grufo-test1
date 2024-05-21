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

class blogcomment extends recordset
{
	function setBlog(&$blog)
	{
		$this->blog = $blog;
	}
	
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
		
		$rs = new blogcomment($res);
		$rs->setBlog($this->blog);
		return $rs;
	}
	
	# Timestamp UNIX du billet
	function getTS()
	{
		return strtotime($this->f('comment_dt'));
	}
	
	# Date litérale
	function getLDate()
	{
		return dt::str($this->blog->date_format,$this->getTS());
	}
	
	# Heure litérale
	function getLTime()
	{
		return dt::str($this->blog->time_format,$this->getTS());
	}
	
	# Date format ISO
	function getIsoDate()
	{
		return date('Y-m-d\\TH:i:s+00:00',$this->getTS());
	}
	
	# Contenu
	function getContent()
	{
		return $this->f('comment_content');
	}
	
	# Email encodé
	function getEncodMail()
	{
		return strtr($this->f('comment_email'),array('@'=>'%40','.'=>'%2e'));
	}
	
	# Lien permanent vers le commentaire
	function getPermURL()
	{
		$post_titre_url = $this->blog->str2url($this->f('post_titre'));
		
		$url = sprintf($this->blog->front_url['post'],$this->f('postyear'),
					$this->f('postmonth'),$this->f('postday'),
					$this->f('post_id'),$post_titre_url);
		
		return $url.'#c'.$this->f('comment_id');
	}
	
	# Obtenir les id avec une éventuelle chaîne devant
	function getIDs($str='')
	{
		$res = array();
		
		$index = $this->int_index;
		$this->moveStart();
		
		while (!$this->EOF())
		{
			$res[] = $str.$this->f('comment_id');
			$this->moveNext();
		}
		$this->move($index);
		return $res;
	}
	
	# Au format XML
	function getXML()
	{
		return 
		'<id>'.$this->f('comment_id')."</id>\n".
		'<auteur>'.$this->f('comment_auteur')."</auteur>\n".
		'<email>'.$this->f('comment_email')."</email>\n".
		'<site>'.$this->f('comment_site')."</site>\n".
		'<content>'.$this->getContent()."</content>\n".
		'<date>'.$this->f('comment_dt')."</date>\n".
		'<ldate>'.$this->getIsoDate()."</ldate>\n";
	}
}
?>
