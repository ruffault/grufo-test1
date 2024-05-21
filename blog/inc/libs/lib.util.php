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

class util
{
	# Retourne une paire de l'élément suivant ou précédent d'un tableau à
	# un indice donné
	function getNextPrev($array,$key,$mode)
	{
		$keys = array_keys($array);
		$values = array_values($array);
		$p = array_flip($keys);
		$pos = !empty($p[$key]) ? $p[$key] : 0;
		
		
		if($mode == 'next') {
			return ($pos+1 < count($array)) ? array($keys[$pos+1] => $values[$pos+1]) : NULL;
		} else {
			return ($pos > 0) ? array($keys[$pos-1] => $values[$pos-1]) : NULL;
		}
	}
	
	# Obtenir l'host complet
	function getHost()
	{
		$server_name = $_SERVER['SERVER_NAME'];
		if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
		{
			$scheme = 'https';
			$port = ($_SERVER['SERVER_PORT'] != '443') ? ':'.$_SERVER['SERVER_PORT'] : '';
		}
		else
		{
			$scheme = 'http';
			$port = ($_SERVER['SERVER_PORT'] != '80') ? ':'.$_SERVER['SERVER_PORT'] : '';
		}
		
		return $scheme.'://'.$server_name.$port;
	}
	
	# Obtenir l'url complète de la page
	function getPageURL($uri=NULL)
	{
		if ($uri == NULL) {
			$uri = $_SERVER['REQUEST_URI'];
		}
		
		return util::getHost().$uri;
	}
	
	# Couper une chaîne aux espaces
	function cutString($str,$l)
	{
		$s = preg_split('/([\s]+)/',$str,-1,PREG_SPLIT_DELIM_CAPTURE);
		
		$res = '';
		$L = 0;
		
		if (strlen($s[0]) >= $l) {
			return substr($s[0],0,$l);
		}
		
		foreach ($s as $v)
		{
			$L = $L+strlen($v);
			
			if ($L > $l) {
				break;
			} else {
				$res .= $v;
			}
		}
		
		return trim($res);
	}
	
	# Converti une chaîne Latin1 en UTF-8 et effectue la translation
	# des caractères litigieux.
	function latin1utf8($str)
	{
		$conv = array(
		chr(194).chr(128) => chr(226).chr(130).chr(172),
		chr(194).chr(130) => chr(226).chr(128).chr(154),
		chr(194).chr(131) => chr(198).chr(146),
		chr(194).chr(132) => chr(226).chr(128).chr(158),
		chr(194).chr(133) => chr(226).chr(128).chr(166),
		chr(194).chr(134) => chr(226).chr(128).chr(160),
		chr(194).chr(135) => chr(226).chr(128).chr(161),
		chr(194).chr(136) => chr(203).chr(134),
		chr(194).chr(137) => chr(226).chr(128).chr(176),
		chr(194).chr(138) => chr(197).chr(160),
		chr(194).chr(139) => chr(226).chr(128).chr(185),
		chr(194).chr(140) => chr(197).chr(146),
		chr(194).chr(145) => chr(226).chr(128).chr(152),
		chr(194).chr(146) => chr(226).chr(128).chr(153),
		chr(194).chr(147) => chr(226).chr(128).chr(156),
		chr(194).chr(148) => chr(226).chr(128).chr(157),
		chr(194).chr(149) => chr(226).chr(128).chr(162),
		chr(194).chr(150) => chr(226).chr(128).chr(147),
		chr(194).chr(151) => chr(226).chr(128).chr(148),
		chr(194).chr(152) => chr(203).chr(156),
		chr(194).chr(153) => chr(226).chr(132).chr(162),
		chr(194).chr(154) => chr(197).chr(161),
		chr(194).chr(155) => chr(226).chr(128).chr(186),
		chr(194).chr(156) => chr(197).chr(147),
		chr(194).chr(159) => chr(197).chr(184)
		);
		
		$str = utf8_encode($str);
		
		return str_replace(array_keys($conv),array_values($conv),$str);
	}
	
	/**
	Encodage d'une chaine en mime Quoted printable
	*/
	function mimeEncode($s,$charset='UTF-8')
	{
		$s = preg_replace('/([\x80-\xFF])/e','"=".strtoupper(dechex(ord("\1")))',$s);
		
		return '=?'.$charset.'?Q?'.$s.'?=';
	}
}
?>