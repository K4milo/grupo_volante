<section class="pre-footer-widgets">
	<div class="container pre-footer-widgets__wrapper">
		<?php dynamic_sidebar('pre-footer-widget-area'); ?>
	</div>
</section>

<section class="pre-footer-marajuera">
	<div class="container pre-footer-marajuera__warpper">
		<figure>
			<img src="<?php bloginfo('template_url')?>/dev-front/images/brand/marajuera.png" alt="fundación marajuera"/>
		</figure>
		<h5>
			Porque creemos en el país, creamos país.<br/>
			Grupo Volante es aliado de la Fundación Marajuera.
		</h5>
	</div>
</section>

<footer class="container-fluid site-footer"> 
	<div class="row site-footer-widgets">
		<?php dynamic_sidebar('footer-widget-area'); ?>
	</div>
	<div class="row site-footer-year">
		<div class="col-lg-12 site-sub-footer">
			<p>Todos los derechos reservados <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?> / &copy; <?php echo date('Y'); ?></a></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
