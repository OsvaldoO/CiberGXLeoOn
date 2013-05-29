
</article>
<link rel="stylesheet" href="<?php echo CSS_URL;?>style.css" type="text/css" />
<article class="col2">
<?php if (isset($nick)): ?>
<div id="sidebar">
			<div class="stats"> 
			<div class="username"><?php echo $nick; ?></div>
			<div><?php echo $rol; ?></div>
			<div class="img_r">
			<img src="<?php echo $avatar; ?>" alt="NO Imagen"/>
			</div>			
			<div class="inline"><?php echo $credito; ?> $</div>
			<div class="inline"><?php echo $puntos; ?> Puntos</div>
			<div class="user_info">
			<ul>
			<li><?php echo $nombre; ?></li>
			<li><?php echo $email; ?></li>
			</ul>
    </div>
    <h4></h4>
    <h4 class="session"><?php echo anchor('eventos/ver',"Mis Eventos");?></h4>
    <h4 class="session"><?php echo anchor('logros',"Mis Logros");?></h4>
    <h4 class="session"><?php echo anchor('usuarios/editar',"Editar Perfil");?></h4>
    <h4 class="session"><?php echo anchor('login/destroy',"Cerrar Seccion");?></h4>
    	</div>
 </div>
 <?php else :?> 
<div class="form">
<?php $this->load->library('form_validation'); 
$this->load->helper('url');?>
<form method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/login'); ?>">
<label>Usuario</label><br>
<input type="text" id="user" name="user"><br><br>
<label>Password</label><br>
<input type="password" id="pass" name="pass">
<br><br>
<button type="submit">Iniciar Secion</button>
</form>
</div>
<?php endif; ?>
    		</article>
		</div>
	</section>
<!-- / content -->
<!-- footer -->
<!-- footer -->
	<footer>
		<div class="wrapper">
			<article class="col pad_left2">
				<h5></h5>
				<ul class="icons">
					<li><a href="https://www.facebook.com/OsvaldOoLeOon"><img src="<?php echo IMG_URL;?>icon1.jpg" alt="">OsvaldoO LeoOn</a></li>
				</ul>
			</article>
		</div>
	</footer>
<!-- / footer -->
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
	$(window).load(function() {
	$('#nivo_slider').nivoSlider({
		effect:'fold', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft'
		slices:7,
		animSpeed:500,
		pauseTime:6000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:true, //Next & Prev
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:1, //Universal caption opacity
		beforeChange:function(){},
		afterChange:function(){},
		slideshowEnd:function(){} //Triggers after all slides have been shown
	});
});
</script>
</body>
</html>