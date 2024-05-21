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

require_once dirname(__FILE__).'/../../../inc/classes/class.filemanager.php';

class dcFileManager extends filemanager
{
	var $p_url;
	var $p_img;
	
	function dcFileManager($root_path,$base_path,$p_url,$p_img)
	{
		parent::filemanager($root_path,$base_path);
		
		$this->p_url = $p_url;
		$this->p_img = $p_img;
	}
	
	function getNavBar()
	{
		$f = '';
		$res = '&#187; <a href="'.$this->p_url.'">'.__('root').'</a>';
		
		if (file_exists($this->root.$this->base_path))
		{
			$r = explode('/',$this->base_path);
			for ($i=1; $i<count($r); $i++) {
				$f .= '/'.$r[$i];
				$res .= '/<a href="'.$this->p_url.'&amp;f='.$f.'">'.$r[$i].'</a>';
			}
		}
		return $res;
	}
	
	function getLine($k,$v,$c)
	{
		$color[0] = 'background:#fff;';
		$color[1] = 'background:#f3f3f3;';
		
		$common_style = 'padding: 1px 0.5em;';
		$name_style = $common_style;
		$common_style .= 'width:1px;white-space:nowrap;';
		$common_style = 'style="'.$common_style.$color[$c].'"';
		$name_style = 'style="'.$name_style.$color[$c].'"';
		
		$res = '<tr>';
		
		$res .= '<td '.$common_style.'>';
		if ($v['d'] && $v['w']) {
			$res .= '<img src="'.$this->p_img.'folder.png" alt="folder" /> ';
		} elseif ($v['d']) {
			$res .= '<img src="'.$this->p_img.'folder-ro.png" alt="folder" /> ';
		} elseif ($v['f'] && $v['w']) {
			if ($v['type'] == 'img') {
				$res .= '<img src="'.$this->p_img.'image.png" alt="file" /> ';
			} else {
				$res .= '<img src="'.$this->p_img.'file.png" alt="file" /> ';
			}
		} else {
			if ($v['type'] == 'img') {
				$res .= '<img src="'.$this->p_img.'image-ro.png" alt="file" /> ';
			} else {
				$res .= '<img src="'.$this->p_img.'file-ro.png" alt="file" /> ';
			}
		}
		$res .= '</td>';
		
		$res .= '<td  '.$name_style.'>';
		if ($v['jail'] && $v['r'] && ($v['f'] || $v['d'] && $v['x'])) {
			$res .= '<a href="'.$this->p_url.'&amp;f='.$v['l'].'">'.$k.'</a>';
		} else {
			$res .= $k;
		}
		$res .= '</td>';
		
		$res .= '<td '.$common_style.'>'.
			files::size(filesize($v['fname'])).'</td>';
		
		$res .= '<td  '.$common_style.'>'.
			strftime('%Y-%m-%d %H:%M:%S',$v['mtime']).'</td>';
		
		$res .= '<td '.$common_style.'>';
		if ($v['del']) {
			$del_msg = sprintf(__('Are you sure you want to delete this %s?'),
				($v['d']) ? __('directory') : __('file'));
			
			$res .= '<a href="'.$this->p_url.'&amp;f='.$v['l'].'&amp;del=1" '.
			'onclick="return window.confirm(\''.$del_msg.'\')">'.
			'<img src="'.$this->p_img.'delete.png" alt="'.__('delete').'" /></a> ';
		}
		
		if ($v['jail'] && $v['r'] && $v['f']) {
			$res .= '<a href="'.$this->p_url.'&amp;f='.$v['l'].'&amp;dl=1">'.
			'<img src="'.$this->p_img.'download.png" alt="'.__('download').'" /></a> ';
		}
		
		$res .= ' </td>';
		
		$res .= '</tr>';
		
		return $res;
	}
}

?>
