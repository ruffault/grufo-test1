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

class blogpost extends recordset
{
	function setBlog(&$blog)
	{
		$this->blog = $blog;
	}
	
	# Format du billet
	function getFormat()
	{
		return ($this->f('post_content_wiki') != '') ? 'wiki' : 'html';
	}
	
	# Nombre de commentaires d'un billet
	function getNbComments()
	{
		return (integer) $this->blog->getNbComments($this->f('post_id'));
	}
	
	# Nombre de trackback d'un billet
	function getNbTrackbacks()
	{
		return (integer) $this->blog->getNbTrackbacks($this->f('post_id'));
	}
	
	# Timestamp UNIX du billet
	function getTS()
	{
		return strtotime($this->f('post_dt'));
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
	
	# Common Name (cn) de l'auteur
	function getUserCN()
	{
		if($this->f('user_pseudo') != '') {
			return $this->f('user_pseudo');
		} else {
			return trim($this->f('user_prenom').' '.$this->f('user_nom'));
		}
	}
	
	# Titre 'URLisé'
	function getTitreURL()
	{
		return $this->f('post_titre_url');
	}
	
	# Titre de catégorie 'URLisé'
	function getCatTitreURL()
	{
		return $this->blog->str2url($this->f('cat_libelle'));
	}
	
	# URL permanente
	function getPermURL()
	{
		return sprintf($this->blog->front_url['post'],$this->f('postyear'),
					$this->f('postmonth'),$this->f('postday'),
					$this->f('post_id'),$this->getTitreURL());
	}
	
	# URL vers la catégorie d'un billet
	function getCatURL()
	{
		return sprintf($this->blog->front_url['cat'],$this->f('cat_libelle_url'));
	}
	
	# Obtenir les id avec une éventuelle chaîne devant
	function getIDs($str='')
	{
		$res = array();
		
		$index = $this->int_index;
		$this->moveStart();
		
		while (!$this->EOF())
		{
			$res[] = $str.$this->f('post_id');
			$this->moveNext();
		}
		$this->move($index);
		return $res;
	}
}
?>