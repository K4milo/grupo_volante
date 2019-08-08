<?php
global $post;


$args = array( 
	'post_type' => 'servicios', 
	'posts_per_page' => -1,
	'post__not_in' => array( $post->ID )
);

$query = new WP_Query( $args );

if($query->have_posts()): ?>
	<section id="Services" class="services internal">
		<header class="header__top">
			<h2>Otros Productos</h2>
		</header>
		<div class="container-fluid">
		<?php while ( $query->have_posts() ) : $query->the_post(); 
			$slug = get_post_field( 'post_name', get_the_ID() );
		?>
			<article class="services__item">
				<a href="<?php the_permalink(); ?>">
					<figure class="services__thumb" style="background-image: url('<?php the_post_thumbnail_url("full"); ?>');">
						<div class="services__thumb-overlay">
							<img src="<?php bloginfo('template_url') ?>/dev-front/images/icons/<?php echo $slug; ?>.svg" alt="<?php the_title(); ?>">
						</div>
					</figure>
					<div class="services__caption">
						<img src="<?php the_field('service_logo'); ?>" alt="<?php the_title(); ?>">
					</div>
				</a>
			</article>
		<?php endwhile; wp_reset_query(); ?>
		</div>
	</section>
<?php endif; ?>