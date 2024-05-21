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
require dirname(__FILE__).'/inc/prepend.php';
require dirname(__FILE__).'/layout/lib.cache.php';

require dirname(__FILE__).'/layout/class.xblog.php';
require dirname(__FILE__).'/layout/class.xblogpost.php';
require dirname(__FILE__).'/layout/class.xblogcomment.php';

$type = (!empty($_GET['type']) && $_GET['type'] == 'co') ? 'co' : 'blog';
$cat = (!empty($_GET['cat'])) ? $_GET['cat'] : '';

# Connexion MySQL
$con = new Connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);

if ($con->error()) { exit; }

# Création de l'objet de type weblog avec uniquement les billets
# publiés
$blog = new xblog($con,DB_PREFIX,1,dc_encoding);
$blog->rs_blogpost = 'xblogpost';
$blog->rs_blogcomment = 'xblogcomment';

$blog->setURL('post','http://'.$_SERVER['SERVER_NAME'].dc_blog_url.dc_format_post_url);

# Si type = co on fait un fil des commentaires
if ($type == 'co')
{
	if (!empty($_GET['post'])) {
		$comments = $blog->getComments($_GET['post'],'DESC');
	} else {
		$comments = $blog->getComments('','DESC',20);
	}
	
	$title = dc_blog_name.' - Commentaires';
	$ts = time();
	$items = $seq = '';
}
else
{
	# Dernières nouvelles
	$news = $blog->getLastNews(10,$cat);
	
	$ts = strtotime($blog->getEarlierDate());
	$title = dc_blog_name;
}

# Cache HTTP
if (dc_http_cache && defined('DC_UPDATE_FILE_W') && DC_UPDATE_FILE_W)
{
	$mod_files = get_included_files();
	$mod_files[] = DC_UPDATE_FILE;
	$mod_files[] = dirname(__FILE__).'/conf/dotclear.ini';
	
	cache::http($mod_files);
}

header('Content-Type: text/xml; charset='.dc_encoding);
echo '<?xml version="1.0" encoding="'.dc_encoding.'" ?>'."\n";
/*
echo '<?xml-stylesheet href="'.$rss_css.'" type="text/css"?>'."\n";
//*/
?>
<feed xmlns="http://purl.org/atom/ns#" version="0.3"
	  xmlns:dc="http://purl.org/dc/elements/1.1/"
	  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	  xml:lang="<?php echo DC_LANG; ?>">

  <title><?php echo $blog->toXML($title); ?></title>
  <link rel="alternate" type="text/html" href="http://<?php echo $_SERVER['SERVER_NAME'].dc_blog_url; ?>"/>
  <tagline type="text/plain" mode="escaped"><?php echo htmlspecialchars(dc_blog_desc); ?></tagline>
  
  <modified><?php echo date('Y-m-d\\TH:i:s+00:00',$ts); ?></modified>
  <generator version="<?php echo DC_VERSION; ?>" url="http://www.dotclear.net/">DotClear</generator>
  
  <sy:updatePeriod>daily</sy:updatePeriod>
  <sy:updateFrequency>1</sy:updateFrequency>
  <sy:updateBase><?php echo date('Y-m-d\\TH:i:s+00:00',$ts); ?></sy:updateBase>
  
<?php
if ($type == 'co')
{
	while(!$comments->EOF()) {
		echo $comments->getAtomEntry();
		$comments->moveNext();
	}
}
else
{
	while(!$news->EOF()) {
		echo $news->getAtomEntry();
		$news->moveNext();
	}
}

$con->close();
?>
</feed>