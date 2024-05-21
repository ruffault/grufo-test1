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

require dirname(__FILE__).'/lib.php';

$err = '';

require dirname(__FILE__).'/config.php';

$p_url = 'tools.php?p=filemanager';
$p_img = 'tools/filemanager/';

$base_path = (!empty($_REQUEST['f'])) ? $_REQUEST['f'] : '';

$dcFM = new dcFileManager($fm_cf_chroot,$base_path,$p_url,$p_img);
$dcFM->addExclusion($fm_cf_exclusion);


/*
header('Content-Type: text/plain');
var_dump($dcFM);
//var_dump($dcFM->getDir());
exit;
//*/

# Téléchargement d'un fichier
if (!empty($_GET['dl']) && $dcFM->isFile() && !$dcFM->isExclude())
{
	if (strpos(basename($dcFM->base_path),'.') === false) {
		$mime_type = 'text/plain';
	} elseif (preg_match('/.png$/',$dcFM->base_path)) {
		$mime_type = 'image/png';
	} elseif (preg_match('/.gif$/',$dcFM->base_path)) {
		$mime_type = 'image/gif';
	} elseif (preg_match('/.(jpg|jpeg)$/',$dcFM->base_path)) {
		$mime_type = 'image/jpeg';
	} elseif (preg_match('/('.$dcFM->_types['txt'].')$/',$dcFM->base_path)) {
		$mime_type = 'text/plain';
	} else {
		$mime_type = 'application/download';
	}
	
	header('Content-Type: '.$mime_type);
	if ($mime_type == 'application/download') {
		header('Content-Disposition: attachment; filename='.basename($dcFM->base_path));
	}
	echo $dcFM->getContent();
	exit;
}

# Création d'un répertoire
if (!empty($_GET['new_dir']) && $dcFM->isWritable() && !$dcFM->isExclude())
{
	if ($dcFM->newDir($_GET['new_dir']) !== false) {
		header('Location: '.$p_url.'&f='.$dcFM->base_path);
		exit;
	} else {
		$err = '<p>'.__('Cannot create this directory.').'</p>';
	}
}

# Ajout d'un fichier
if (!empty($_FILES['up_file']) && !$dcFM->isExclude())
{
	$up_name = trim(str_replace('/','',$_POST['up_name']));
	$tmp_file = $_FILES['up_file']['tmp_name'];
	
	$file_name = $_FILES['up_file']['name'];
	$dest_file = $dcFM->root.$dcFM->base_path.'/'.$file_name;
	
	if ($up_name != '') {
		$dest_file = $dcFM->root.$dcFM->base_path.'/'.$up_name;
	}
	
	$uerr = array();
	
	if (version_compare(phpversion(),'4.2.0','>=')) {
		$upd_error = $_FILES['up_file']['error'];
	} else {
		$upd_error = 0;
	}
	
	if($upd_error != 0)
	{
		switch ($upd_error) {
			case 1:
			case 2:
				$uerr[] = __('File size exceeds the authorized limit');
				break;
			case 3:
				$uerr[] = __('File was only partially uploaded');
				break;
			case 4:
				$uerr[] = __('No file');
				break; 
		}
	}
	elseif (file_exists($dest_file))
	{
		$err = '<p>'.__('Cannot upload: destination file exists.').'</p>';
	}
	elseif (@move_uploaded_file($tmp_file,$dest_file) !== false)
	{
		chmod($dest_file,fileperms(dirname($dest_file)) & ~0111);
		header('Location: '.$p_url.'&f='.$dcFM->base_path);
		exit;
	}
	else
	{
		$err = '<p>'.__('Cannot upload.').'</p>';
	}
	
	if (count($uerr) > 0) {
		$err = '<ul><li>'.implode('</li><li>',$uerr).'</li></ul>';
	}
}

if ($dcFM->base_path != '' && !$dcFM->isExclude())
{
	# Modification d'un fichier
	if (!empty($_POST['f_content']) && $dcFM->isWritable())
	{
		$f_content = str_replace("\r",'',$_POST['f_content']);
		if ($dcFM->putContent($f_content) !== false)	{
			header('Location: '.$p_url.'&f='.$dcFM->base_path);
			exit;
		} else {
			$err = '<p>'.__('Cannot write file.').'</p>';
		}
	}
	
	# Renommer un fichier/répertoire
	if (!empty($_GET['new_name']) && $dcFM->isParentWritable())
	{
		if($dcFM->rename($_GET['new_name']) !== false) {
			header('Location: '.$p_url.'&f='.dirname($dcFM->base_path));
			exit;
		} else {
			$err = '<p>'.__('Cannot rename.').'</p>';
		}
	}
	
	# Suppression d'un fichier
	if (!empty($_GET['del']) && $dcFM->isDeletable())
	{
		if ($dcFM->delete() === true) {
			header('Location: '.$p_url.'&f='.dirname($dcFM->base_path));
			exit;
		} else {
			$err = '<p>'.__('Cannot delete.').'</p>';
		}
	}
}


/* Affichage
-------------------------------------------------------- */
buffer::str('<h2>'.__('Files manager').'</h2>');

if ($err != '') {
	buffer::str(
	'<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
	$err.
	'</div>'
	);
}

buffer::str('<p>'.$dcFM->getNavBar().'</p>');

if (!$dcFM->isExclude() && ($f_list = $dcFM->getDir()) !== false)
{
	$th_style=' style="border-bottom:1px solid #ccc;"';
	
	buffer::str(
	'<table style="width:98%;border-collapse:separate;border-spacing:1px;">'.
	'<tr><th'.$th_style.'>&nbsp;</th><th'.$th_style.'>'.__('name').'</th>'.
	'<th'.$th_style.'>'.__('size').'</th><th'.$th_style.'>'.__('date').'</th>'.
	'<th'.$th_style.'>&nbsp;</th></tr>'
	);
	
	$i=0;
	foreach ($f_list['dirs'] as $k => $v) {
		buffer::str(@$dcFM->getLine($k,$v,($i%2)));
		$i++;
	}
	foreach ($f_list['files'] as $k => $v) {
		buffer::str(@$dcFM->getLine($k,$v,($i%2)));
		$i++;
	}
	buffer::str('</table>');
}


if ($dcFM->isFile() && !$dcFM->isExclude())
{
	if (!$dcFM->isReadable())
	{
		buffer::str('<p>'.__('This file is not readable.').'</p>');
	}
	else
	{
		if ($dcFM->isImg())
		{
			buffer::str(
			'<img style="border:1px dashed #fc0;" '.
			'src="'.$p_url.'&amp;f='.$dcFM->base_path.'&amp;dl=1" alt="" />'
			);
		}
		else
		{
			if ($dcFM->isWritable())
			{
				buffer::str(
				'<p>'.__('This file is writable.').'</p>'.
				'<form action="tools.php" method="post">'.
				'<textarea id="f_content" name="f_content" '.
				'rows="26" cols="60" style="width:100%;font-family:courier,monospace;">'.
				htmlspecialchars($dcFM->getContent()).'</textarea>'.
				'<p><input type="submit" class="submit" value="'.__('save').'" />'.
				'<input type="hidden" name="f" value="'.htmlspecialchars($dcFM->base_path).'" />'.
				'<input type="hidden" name="p" value="filemanager" /></p>'.
				'</form>'
				);
			}
			else
			{
				buffer::str(
				'<p>'.__('This file is not writable.').'</p>'.
				'<div style="overflow:auto; height:26em; background:#eee;">'.
				'<pre style="padding:0.5em">'.
				htmlspecialchars($dcFM->getContent()).
				'</pre></div>'
				);
			}
		}
	}
}

if ($dcFM->base_path != '' and $dcFM->isParentWritable() && !$dcFM->isExclude())
{
	buffer::str(
	'<form action="tools.php" method="get">'.
	'<fieldset><legend>'.
	sprintf(__('Rename this %s'),($dcFM->isFile()) ? __('file') : __('directory')).
	'</legend>'.
	'<p><label for="new_name">'.__('New name').'&nbsp;:</label> '.
	form::field('new_name',20,'',htmlspecialchars(basename($dcFM->base_path))).
	' <input type="submit" class="submit" value="renommer" />'.
	'<input type="hidden" name="p" value="filemanager" />'.
	'<input type="hidden" name="f" value="'.htmlspecialchars($dcFM->base_path).'" /></p>'.
	'</fieldset></form>'
	);
}

if ($dcFM->isWritable() && $dcFM->isDir() && !$dcFM->isExclude())
{
	buffer::str(
	'<form action="tools.php" method="get">'.
	'<fieldset><legend>'.__('New directory').'</legend>'.
	'<p><label for="new_dir">'.__('Name').'&nbsp;:</label> '.
	form::field('new_dir',20,'').
	' <input type="submit" class="submit" value="'.__('save').'" />'.
	'<input type="hidden" name="p" value="filemanager" />'.
	'<input type="hidden" name="f" value="'.htmlspecialchars($dcFM->base_path).'" /></p>'.
	'</fieldset></form>'
	);
	
	buffer::str(
	'<form enctype="multipart/form-data" action="tools.php" method="post">'.
	'<fieldset><legend>'.__('Add a file').' :</legend>'.
	'<p><label for="up_file">'.__('Choose a file').'&nbsp;:</label> '.
	'<input name="up_file" id="up_file" type="file" /></p>'.
	'<p><label for="up_name">'.__('Optionnal new name').'&nbsp;:</label>'.
	form::field('up_name',20,'').' '.
	'<input type="submit" class="submit" value="envoyer" />'.
	'<input type="hidden" name="p" value="filemanager" />'.
	'<input type="hidden" name="f" value="'.htmlspecialchars($dcFM->base_path).'" /></p>'.
	'</fieldset></form>'
	);
}
?>