<?php

/*
	Gallery fields
	gallery
		gallery_img
		gallery_title
*/

$gallery = get_field('gallery');

if($gallery): ?>
	<section id="gallerySlider" class="gallery-slider">
		<?php
			while(have_rows('gallery')): the_row(); 
				$gallery_img = get_sub_field('gallery_img');
				$gallery_title = get_sub_field('gallery_title');
		?>
		<div class="gallery-slider__row" style="background-image: url('<?php echo $gallery_img['url']; ?>')">
			<?php if($gallery_title): ?>
				<div class="gallery-slider__caption">
					<h3><?php echo $gallery_title; ?></h3>
				</div>
			<?php endif; ?>
		</div>		
		<?php endwhile; ?>
	</section>
<?php endif; ?>