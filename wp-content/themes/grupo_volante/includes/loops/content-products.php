<?php

$args = array( 
	'post_type' => 'servicios', 
	'posts_per_page' => -1
);

$query = new WP_Query( $args );

if($query->have_posts()): ?>
	<section id="Services" class="services-page">
		<header class="header__top">
			<h2><?php the_title(); ?></h2>
		</header>
		<div class="container-fluid">
		<?php while ( $query->have_posts() ) : $query->the_post(); 
			$slug = get_post_field( 'post_name', get_the_ID() );
		?>
			<article class="services__row row">
				<a href="<?php the_permalink(); ?>"  class="services__row-thumbnail">
					<figure class="services__thumb" style="background-image: url('<?php the_post_thumbnail_url("full"); ?>');">
					</figure>
				</a>
				<div class="services__row--caption">
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				</div>
				
			</article>
		<?php endwhile; wp_reset_query(); ?>
		</div>
	</section>
<?php endif; ?>