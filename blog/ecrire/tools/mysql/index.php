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

$url = 'tools.php?p=mysql';

$img_check = 'images/check_%s.png';

$optimize = (!empty($_GET['optimize'])) ? $_GET['optimize'] : '';

if ($optimize == 1)
{
	buffer::str('<h2>'.__('Optimization').'</h2>');
	
	if ($blog->optimize() !== false) {
		buffer::str(
		'<p><img src="'.sprintf($img_check,'on').'" alt="ok" /> '.
		__('Optimize tables').'</p>'
		);
	} else {
		buffer::str(
		'<p><img src="'.sprintf($img_check,'off').'" alt="ok" /> '.
		__('Error during tables optimization').'</p>'
		);
	}
	
	$blog->countAll();
	buffer::str(
	'<p><img src="'.sprintf($img_check,'on').'" alt="ok" /> '.
	__('Count comments').'</p>'
	);
	
	buffer::str(
	'<p>'.__('Optimization done').'</p>'.
	'<p><a href="tools.php">'.__('Back to tools').'</a></p>'
	);
	
	# Vide le cache
	if (is_writable(DC_CACHE_DIR) && ($fd = opendir(DC_CACHE_DIR)) !== false)
	{
		while($entryname = readdir($fd)) {
			if (is_file(DC_CACHE_DIR.'/'.$entryname)) {
				@unlink(DC_CACHE_DIR.'/'.$entryname);
			}
		}
		closedir($fd);
	}
}
else
{
	buffer::str(
	'<h2>'.__('MySQL database operations').'</h2>'.
	'<h3>'.__('Optimization').'</h3>'.
	'<p>'.__('This operation allows you to optimize DotClear-related tables '.
	'in MySQL and keep some data safe. No data should be lost during this '.
	'operation.').'</p>'.
	'<p><strong>'.__('Important').'</strong>&nbsp;: '.
	__('Such an operation could take some time. Please be patient.').'</p>'.
	'<p><a href="'.$url.'&amp;optimize=1">'.__('Optimize database').'</a></p>'
	);
}

?>
