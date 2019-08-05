<?php
/*
The Simple Posts Loop
=====================
*/
?> 

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <section class="container tech-content">
            <?php the_content()?>
            <?php
            	$technotes = get_field('technotes');
            	if($technotes):
            ?>
				<table class="tech-content__files">
					<thead>
						<tr>
							<th>Nombre de Archivo</th>
							<th>Descargar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							while(have_rows('technotes')): the_row();

							$name_file = get_sub_field('technotes_name');
							$src_file = get_sub_field('technotes_file');
						?>
						<tr>
							<td class="name"><?php echo $name_file; ?></td>
							<td class="file"><a href="<?php echo $src_file; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span></a></td>
						</tr>
						<?php 
							endwhile;
						?>
					</tbody>
				</table>
            <?php
            	endif;
            ?>
        </section>
    </article>
<?php endwhile; ?>
<?php endif; ?>