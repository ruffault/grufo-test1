
{literal}
<style type="text/css">
		
			
			.boxgrid{ 
				width: 180px; 
				height: 170px; 
				background:#fff; 
				/*border: solid 1px #D4CFB8; */
				overflow: hidden; 
				position: relative; 
			}
				.boxgrid img{ 
					position: absolute; 
					top: 0px; 
					left: 0px; 
					border: 0; 
				}
				.boxgrid p{ 
					padding: 0 10px; 
					color:#afafaf; 
					font-weight:bold; 
					font:10pt "Lucida Grande", Arial, sans-serif; 
				}
				
			.boxcaption{ 
				float: left; 
				position: absolute; 
				background: #000; 
				height: 100px; 
				width: 100%; 
				opacity: .8; 
				/* For IE 5-7 */
				filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
				/* For IE 8 */
				-MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
 			}
 				.captionfull .boxcaption {
 					top: 150;
 					left: 0;
 				}
 				.caption .boxcaption {
 					top: 120;
 					left: 0;
 				}
				
		</style>
		
		<script type="text/javascript" src="https://jqueryjs.googlecode.com/files/jquery-1.3.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
				//Vertical Sliding
				$('.boxgrid.slidedown').hover(function(){
					$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
				});
				//Horizontal Sliding
				$('.boxgrid.slideright').hover(function(){
					$(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
				});
				//Diagnal Sliding
				$('.boxgrid.thecombo').hover(function(){
					$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
				});
				//Partial Sliding (Only show some of background)
				$('.boxgrid.peek').hover(function(){
					$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
				});
				//Full Caption Sliding (Hidden to Visible)
				$('.boxgrid.captionfull').hover(function(){
					$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'260px'},{queue:false,duration:160});
				});
				//Caption Sliding (Partially Hidden to Visible)
				$('.boxgrid.caption').hover(function(){
					$(".cover", this).stop().animate({top:'150px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'120px'},{queue:false,duration:160});
				});
			});
		</script>
{/literal}
</script>

			<div class="boxgrid slideright">
				<img class="cover" src="https://localhost:8888/web/css/annonce.jpg"/>
				<h3>A paraitre</h3>
				<p>dictionnaire de mécanique</p>
				<p><a href="https://www.nonsensesociety.com/2009/03/photography-by-martin-stranka/" target="_BLANK">En savoir plus</a></p>
			</div>
