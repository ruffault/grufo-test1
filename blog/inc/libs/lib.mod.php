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

function dc_get_mod($blog_url,$preargs=NULL)
{
	$year = $month = $day = $post_id = $cat_id = $cat_name = NULL;
	$mode = 'home';
	
	$args = '';
	
	# On catch les arguments qui suivent l'url du script
	# Ensuite on vire les / du début et de la fin
	if (preg_match('/^'.preg_quote($blog_url.$preargs,'/').'(.*)$/',$_SERVER['REQUEST_URI'],$match)) {
		$args = preg_replace('/^[\/]?(.*?)[\/]?$/','$1',$match[1]);
	}
	
		
	if($args != '')
	{
		if(preg_match('#^([0-9]{4})/([0-9]{2})(/|\z)#',$args,$match))
		{
			$mode = 'month';
			$year = $match[1];
			$month = $match[2];
			if(preg_match('#^([0-9]{4})/([0-9]{2})/([0-9]{2})(/|\z)#',$args,$match))
			{
				$mode = 'day';
				$day = $match[3];
				if(preg_match('#^([0-9]{4})/([0-9]{2})/([0-9]{2})/([0-9]+)#',$args,$match))
				{
					$mode = 'post';
					$post_id = $match[4];
				}
			}
		}
		elseif(preg_match('#^([A-Za-z_]+)([^/]*)?(/|\z)#',$args,$match))
		{
			$mode = 'cat';
			//$cat_name = $match[2];
			$cat_id = $match[1];
			if(preg_match('#^[A-Za-z_]+([^/]*)?/([0-9]{4})/([0-9]{2})#',$args,$match))
			{
				$mode = 'month';
				$year = $match[2];
				$month = $match[3];
				if(preg_match('#^[A-Za-z_]+([^/]*)?/([0-9]{4})/([0-9]{2})/([0-9]{2})#',$args,$match))
				{
					$mode = 'day';
					$day = $match[4];
				}
			}
		}
	}
	
	return array(
			'mode' => $mode,
			'year' => $year,
			'month' => $month,
			'day' => $day,
			'post_id' => $post_id,
			'cat_id' => $cat_id,
			'cat_name' => $cat_name
			);
}

?>
