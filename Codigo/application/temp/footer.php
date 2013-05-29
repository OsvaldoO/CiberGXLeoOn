</article>
<link rel="stylesheet" href="<?php echo CSS_URL;?>style.css" type="text/css" />
<article class="col2">
				<h3>Latest Works</h3>
				<ul class="ul_works">
					<li><a href="#"><img src="<?php echo IMG_URL;?>page1_img1.png" alt=""></a></li>
					<li><a href="#"><img src="<?php echo IMG_URL;?>page1_img2.png" alt=""></a></li>
				</ul>
				<h4>Recent Tweets</h4>
				<div class="tweets">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.<br><a href="#">20 days ago</a></p>
					<p>Accusantium doloremque laudatium, totam rem aperiam, eaque ipsa.<br><a href="#">36 days ago</a></p>
					<p>Nemo enim ipsam voluptatem quia voluptas.<br><a href="#">54 days ago</a></p>
				</div>
    		</article>
		</div>
	</section>
<!-- / content -->
<!-- footer -->
<!-- footer -->
	<footer>
		<div class="wrapper">
			<article class="col">
				<h5>Why Us</h5>
				<ul class="list1">
					<li><a href="#">Sedut perspiciatis</a></li>
					<li><a href="#">Unde omnis iste</a></li>
					<li><a href="#">Natus error sit </a></li>
					<li><a href="#">Volupttem accus</a></li>
					<li><a href="#">Ntium doloremque </a></li>
				</ul>
			</article>
			<article class="col pad_left2">
				<h5>Links</h5>
				<ul class="list1">
					<li><a href="#">Audantium, totam</a></li>
					<li><a href="#">Remaperiam, eaque</a></li>
					<li><a href="#">Ipsa quae abillo</a></li>
					<li><a href="#">Inventore veritatis et </a></li>
					<li><a href="#">Quasi architecto </a></li>
				</ul>
			</article>
			<article class="col pad_left2">
				<h5>Follow Us</h5>
				<ul class="icons">
					<li><a href="#"><img src="images/icon1.jpg" alt="">Facebook</a></li>
					<li><a href="#"><img src="images/icon2.jpg" alt="">Stumleupon</a></li>
					<li><a href="#"><img src="images/icon3.jpg" alt="">Twitter</a></li>
					<li><a href="#"><img src="images/icon4.jpg" alt="">Digg</a></li>
					<li><a href="#"><img src="images/icon5.jpg" alt="">RSS Feed</a></li>
				</ul>
			</article>
			<article id="newsletter">
				<h5>Newsletter</h5>
				<form id="newsletter_form">
					<div class="wrapper">
						<input class="input" type="text" value="Enter your email here" onblur="if(this.value=='') this.value='Enter your email here'" onFocus="if(this.value =='Enter your email here' ) this.value=''" >
					</div>
					<a href="#" onClick="document.getElementById('newsletter_form').submit()">Subscribe</a>
				</form>
			</article>
		</div>
		<article class="privacy">
			<a rel="nofollow" href="http://www.templatemonster.com/">Website template</a> designed by TemplateMonster.com<br><a href="http://www.templates.com/product/3d-models/">3D Models</a> provided by Templates.com
		</article>
		<a href="index.html" class="footer_logo">Design<span>Studio</span>.com</a>
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