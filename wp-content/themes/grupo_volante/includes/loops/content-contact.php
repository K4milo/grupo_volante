<?php
/*
The Page Contact
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<section id="HeroBanner" class="hero-slider banner" style="background-image: url('<?php the_post_thumbnail_url("full"); ?>');">
		<div class="hero-slider__caption">
			<h2><?php the_title(); ?></h2>
		</div>
	</section>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <div class="page-contact">           
            <div class="page-contact__wrapper container">
            	<div class="page__left">
            		<?php echo do_shortcode('[contact-form-7 id="86" title="Formulario de contacto 1"]'); ?>
            		<?php the_content()?>
            	</div>
            	<div class="page-contact__right">
            		<div id="theMap"></div>
            	</div>
            </div>            	
        </div>
    </article>
<?php endwhile; ?>
<?php else: get_template_part('includes/loops/content', 'none'); ?>
<?php endif; ?>