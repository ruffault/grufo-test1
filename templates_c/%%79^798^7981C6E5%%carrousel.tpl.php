<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:42
         compiled from de/carrousel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'de/carrousel.tpl', 128, false),array('modifier', 'nl2br', 'de/carrousel.tpl', 132, false),array('modifier', 'product_link', 'de/carrousel.tpl', 143, false),array('modifier', 'truncate', 'de/carrousel.tpl', 146, false),)), $this); ?>
﻿
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	//Configuration
		  var retour = true;
		  var tempsTransition = 1000;
		  var affichePlayPause = true;
		  var lectureAutomatique = true;
		  	var tempsAttente = 6000;
			
		  var icones = new Array();
		  		icones[\'play\'] = \'img/play_slider.png\';
		  		icones[\'pause\'] = \'img/pause_slider.png\';	
			
		  var currentPosition = 0;
		  var slideWidth = 500;
		  var slides = $(\'.slide\');
		  var numberOfSlides = slides.length;
		  var interval;
		  var lectureEnCours = false;
  // Supprime la scrollbar en JS
  $(\'#slidesContainer\').css(\'overflow\', \'hidden\');

  // Attribue  #slideInner  à toutes les div .slide
  slides
    .wrapAll(\'<div id="slideInner"></div>\')
    // Float left to display horizontally, readjust .slides width
	.css({
      \'float\' : \'left\',
      \'width\' : slideWidth
    });

  // Longueur de #slideInner égale au total de la longueur de tous les slides
  $(\'#slideInner\').css(\'width\', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $(\'#slideshow\')
    .prepend(\'<span class="control" id="leftControl">Précédent</span>\')
    .append(\'<span class="control" id="rightControl">Suivant</span>\');


  
  // Hide left arrow control on first load
  manageControls(currentPosition);

  //Crée un écouteur d\'évènement de type clic sur les classes .control
  $(\'.control\')
    .bind(\'click\', function(){
		
    // Determine la nouvelle position
	currentPosition = ($(this).attr(\'id\')==\'rightControl\') ? currentPosition+1 : currentPosition-1;
    
	if(currentPosition == numberOfSlides && retour == false ){
		currentPosition--;
		pause();
	}
	
	// Cache ou montre les controles
    manageControls(currentPosition);
    // Fais bouger le slide
    $(\'#slideInner\').animate({
      \'marginLeft\' : slideWidth*(-currentPosition)
    },tempsTransition);
  });

  // manageControls: Cache ou montre les flêches de controle en fonction de la position courante
  function manageControls(position){
    // Cache la fleche "précédent" si on est sur le premier slide
	if(position==0){ $(\'#leftControl\').hide() } else{ $(\'#leftControl\').show() }
	// Cache la fleche "suivant" si on est sur le dernier slide (et que le retour automatique n\'est pas activé)
    if(position==numberOfSlides-1 && retour == false){
		$(\'#rightControl\').hide();
	} else {
		$(\'#rightControl\').show();
	}
	if(position == numberOfSlides && retour == true){
		currentPosition = 0;
		 $(\'#leftControl\').hide();
	}
  }
  function suivant(){
	$(\'#rightControl\').click();
	}
  function start() {
  	lectureEnCours = true;
    interval = setInterval(suivant, tempsAttente );
  }
  function pause() {
  	lectureEnCours = false;
   clearInterval(interval);
  }
  
 //Si le diapo est activé 
if(lectureAutomatique == true){
  start();
}
if(affichePlayPause == true){

	if(lectureAutomatique == true){
		$(\'#navDiapo\').attr(\'src\',icones[\'pause\']);
	}else{
		$(\'#navDiapo\').attr(\'src\',icones[\'play\']);	
	}
	$(\'#navDiapo\').bind(\'click\', function(){
		if(lectureEnCours == true){
			$(this).attr(\'src\',icones[\'play\']);
			pause();
		}else{
			$(this).attr(\'src\',icones[\'pause\']);
			start();
		}
	});
}


  	
});
'; ?>

</script>
<!-- Slideshow HTML -->
<div id="slideshow">
	<div id="slidesContainer" class="border_all">

    <?php unset($this->_sections['messages']);
$this->_sections['messages']['name'] = 'messages';
$this->_sections['messages']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['messages']['show'] = true;
$this->_sections['messages']['max'] = $this->_sections['messages']['loop'];
$this->_sections['messages']['step'] = 1;
$this->_sections['messages']['start'] = $this->_sections['messages']['step'] > 0 ? 0 : $this->_sections['messages']['loop']-1;
if ($this->_sections['messages']['show']) {
    $this->_sections['messages']['total'] = $this->_sections['messages']['loop'];
    if ($this->_sections['messages']['total'] == 0)
        $this->_sections['messages']['show'] = false;
} else
    $this->_sections['messages']['total'] = 0;
if ($this->_sections['messages']['show']):

            for ($this->_sections['messages']['index'] = $this->_sections['messages']['start'], $this->_sections['messages']['iteration'] = 1;
                 $this->_sections['messages']['iteration'] <= $this->_sections['messages']['total'];
                 $this->_sections['messages']['index'] += $this->_sections['messages']['step'], $this->_sections['messages']['iteration']++):
$this->_sections['messages']['rownum'] = $this->_sections['messages']['iteration'];
$this->_sections['messages']['index_prev'] = $this->_sections['messages']['index'] - $this->_sections['messages']['step'];
$this->_sections['messages']['index_next'] = $this->_sections['messages']['index'] + $this->_sections['messages']['step'];
$this->_sections['messages']['first']      = ($this->_sections['messages']['iteration'] == 1);
$this->_sections['messages']['last']       = ($this->_sections['messages']['iteration'] == $this->_sections['messages']['total']);
?>
      <div class="slide">
     	 <div class="titre">
       		 <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['TITRE_MSG'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</h2>
         </div>
      	<div class="contenu">
        	<br>
			<h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['CONTENU_MSG'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</h3>
      	</div>
      </div>
      <?php endfor; endif; ?>
      
	<?php unset($this->_sections['carrousel']);
$this->_sections['carrousel']['name'] = 'carrousel';
$this->_sections['carrousel']['loop'] = is_array($_loop=$this->_tpl_vars['carrousel']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['carrousel']['show'] = true;
$this->_sections['carrousel']['max'] = $this->_sections['carrousel']['loop'];
$this->_sections['carrousel']['step'] = 1;
$this->_sections['carrousel']['start'] = $this->_sections['carrousel']['step'] > 0 ? 0 : $this->_sections['carrousel']['loop']-1;
if ($this->_sections['carrousel']['show']) {
    $this->_sections['carrousel']['total'] = $this->_sections['carrousel']['loop'];
    if ($this->_sections['carrousel']['total'] == 0)
        $this->_sections['carrousel']['show'] = false;
} else
    $this->_sections['carrousel']['total'] = 0;
if ($this->_sections['carrousel']['show']):

            for ($this->_sections['carrousel']['index'] = $this->_sections['carrousel']['start'], $this->_sections['carrousel']['iteration'] = 1;
                 $this->_sections['carrousel']['iteration'] <= $this->_sections['carrousel']['total'];
                 $this->_sections['carrousel']['index'] += $this->_sections['carrousel']['step'], $this->_sections['carrousel']['iteration']++):
$this->_sections['carrousel']['rownum'] = $this->_sections['carrousel']['iteration'];
$this->_sections['carrousel']['index_prev'] = $this->_sections['carrousel']['index'] - $this->_sections['carrousel']['step'];
$this->_sections['carrousel']['index_next'] = $this->_sections['carrousel']['index'] + $this->_sections['carrousel']['step'];
$this->_sections['carrousel']['first']      = ($this->_sections['carrousel']['iteration'] == 1);
$this->_sections['carrousel']['last']       = ($this->_sections['carrousel']['iteration'] == $this->_sections['carrousel']['total']);
?>
      <div class="slide">
     	 <div class="titre">
       		 <h2>Produktauswahl</h2>
         </div>
         <div class="contenu">
				<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['nom'], $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['nom'], $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['categorie'])); ?>
">
				<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['id_produit']; ?>
_mini.jpg" alt="" /></a>
				<h3><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['nom'], $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['nom'], $this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h3>
				<p class='description'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['carrousel'][$this->_sections['carrousel']['index']]['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 205, "...", true) : smarty_modifier_truncate($_tmp, 205, "...", true)); ?>
</p>
      	 </div>
      </div>
      <?php endfor; endif; ?>
      
     
	</div>
</div>
<!-- Slideshow HTML -->

