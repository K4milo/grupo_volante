<?php

$args = array( 
	'post_type' => 'partners', 
	'posts_per_page' => -1
);

$query = new WP_Query( $args );

if($query->have_posts()): ?>
	<section id="Partners" class="partners">
		<header class="header__top">
			<h2>Tenemos los mejores aliados</h2>
		</header>
		<ul>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<li class="partners__item"><figure><?php the_post_thumbnail("full");?></figure></li>
		<?php endwhile; wp_reset_query(); ?>
		</ul>
	</section>
<?php endif; 