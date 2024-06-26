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

$err = '';
$tool_url = '';

# Liste des th�mes
$plugins_root = dirname(__FILE__).'/../';
$plugins = new plugins($plugins_root);
$plugins->getPlugins(false);
$plugins_list = $plugins->getPluginsList();

$is_writable = is_writable($plugins_root);

# Installation d'un th�me
if ($is_writable && !empty($_GET['tool_url']))
{
	$tool_url = $_GET['tool_url'];
	$parsed_url = parse_url($tool_url);
	
	if (empty($parsed_url['scheme']) || !preg_match('/^http|ftp$/',$parsed_url['scheme'])
	|| empty($parsed_url['host']) || empty($parsed_url['path']))
	{
		$err = __('URL is not valid.');
	}
	else
	{
		if (($err = $plugins->install($tool_url)) === true)
		{
			header('Location: tools.php?p=toolsmng');
			exit;
		}
	}
}

# Changement de status d'un plugin
$switch = (!empty($_GET['switch'])) ? $_GET['switch'] : '';

if ($is_writable && $switch != '' && in_array($switch,array_keys($plugins_list)) && $switch != 'toolsmng')
{
	$plugins->switchStatus($switch);
	header('Location: tools.php?p=toolsmng');
	exit;
}

# Suppression d'un th�me
$delete = (!empty($_GET['delete'])) ? $_GET['delete'] : '';

if ($is_writable && $delete != '' && in_array($delete,array_keys($plugins_list)) && $delete != 'toolsmng')
{
	files::deltree($plugins_root.'/'.$delete);
	header('Location: tools.php?p=toolsmng');
	exit;
}

if($err != '')
{
	buffer::str(
	'<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.$err.'</div>'
	);
}

buffer::str(
'<h2>'.__('Plugins manager').'</h2>'.
'<h3>'.__('Install a plugin').'</h3>'
);

if (!$is_writable)
{
	buffer::str(
	'<p>'.sprintf(__('The folder %s is not writable, please check its permissions.'),
	DC_ECRIRE.'/tools/').'</p>'
	);
}
else
{
	buffer::str(
	'<form action="tools.php" method="get">'.
	'<p><label for="tool_url">'.__('Please give the URL (http or ftp) of the plugin\'s file').' :</label>'.
	form::field('tool_url',50,'',$tool_url).'</p>'.
	'<p><input type="submit" class="submit" value="'.__('install').'" />'.
	'<input type="hidden" name="p" value="toolsmng" /></p>'.
	'</form>'
	);
}

buffer::str(
'<p><a href="http://www.dotclear.net/plugins/">'.__('Install new plugins').'</a></p>'
);

# Traduction des plugins
foreach ($plugins_list as $k => $v)
{
	$plugins->loadl10n($k);
	
	$plugins_list[$k]['label'] = __($v['label']);
	$plugins_list[$k]['desc'] = __($v['desc']);
}

# Tri des plugins par leur nom
uasort($plugins_list,create_function('$a,$b','return strcmp($a["label"],$b["label"]);'));

buffer::str(
'<h3>'.__('List of installed plugins').'</h3>'.
'<dl>'
);

foreach ($plugins_list as $k => $v)
{
	buffer::str(
	'<dt>'.__($v['label']).' - '.$k.'</dt>'.
	'<dd>'.__($v['desc']).' <br />'.
	'par '.$v['author'].' - '.__('version').' '.$v['version'].' <br />'
	);
	
 	if ($k != 'toolsmng')
	{
		if (is_writable($plugins_root.$k.'/desc.xml')) {
			$action = $v['active'] ? 'disable' : 'enable';
			buffer::str('<a href="tools.php?p=toolsmng&switch='.$k.'">'.__($action).'</a>');
		} else {
			buffer::str('<em>'.sprintf(__('cannot enable/disable'),'desc.xml').'</em>');
		}
		
		if ($is_writable)
		{
			buffer::str(
			' - <a href="tools.php?p=toolsmng&amp;delete='.$k.'" '.
			'onclick="return window.confirm(\''.__('Are you sure you want to delete this plugin ?').'\')">'.
			__('delete').'</a>'
			);
		}
 	}
	
	buffer::str('</dd>');
}
buffer::str('</dl>');
?>