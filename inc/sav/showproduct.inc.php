<?php

if (!isset($_GET['idcat']))
{
  $_GET['idcat'] = 0;
}

$hit = give_hit($_GET['id']) + 1;
update_hit($_GET['id'], $hit);

$script = "<script type=\"text/javascript\">
          function zoom(codeimg) {
	         window.open('" . $urlsite . "zoom.php?img='+codeimg,'zoom','resizable=yes,scrollbars=no,toolbar=no,location=no,menubar=no,width=380,height=520');
          }
$(document).ready(function()
{


	//slides hover
	$('#secondpane h3.menu_head').mouseover(function()
    {
	     $(this).next('div.menu_body').slideDown(500).siblings('div.menu_body').slideUp('slow');
         
	});
});
    $('#readyTest').corner();
    
    $(function(){

		$('h3').corner('\"top 8px\"');

    });

          </script>";


$showproduct = give_product($_GET['id']);
$auteur = $showproduct['id_auteur'];
$categorie = $showproduct['id_categorie'];

if ($showproduct['thematic'] != '')
	$smarty->assign('thematic', $showproduct['thematic']);
if ($showproduct['meta'] != '')
	$smarty->assign('meta', $showproduct['meta']);
$smarty->assign('showproduct', $showproduct);
$smarty->assign('script', $script);


?>
