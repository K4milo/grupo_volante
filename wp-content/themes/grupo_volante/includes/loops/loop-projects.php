<?php

$args = array( 
	'post_type' => 'proyectos', 
	'posts_per_page' => -1
);

$query = new WP_Query( $args );

if($query->have_posts()): ?>
	<section id="Projects" class="projects">
		<header class="header__top">
			<h2>Proyectos Realizados</h2>
		</header>
		<div class="container">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<article class="projects__item">
				<a href="<?php the_permalink(); ?>">
					<figure class="projects__thumb" style="background-image: url('<?php the_post_thumbnail_url("full"); ?>');">						
					</figure>
					<div class="projects__caption">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</div>
				</a>
			</article>
		<?php endwhile; wp_reset_query(); ?>
		</div>
	</section>
<?php endif; 