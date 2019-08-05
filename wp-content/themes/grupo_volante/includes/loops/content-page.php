<?php
/*
The Page Loop
=============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <div class="single-page">
            <header class="header__top">
                <h2><?php the_title()?></h2>
            </header>
            <section id="SingleService" class="single-page__wrapper container">
                <div class="single-page__content">
                    <?php the_content();?>
                </div>
                <div class="single-page__image">
                    <figure style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></figure>
                </div>            
            </section>
        </div>
    </article>
<?php endwhile; ?>
<?php else: get_template_part('includes/loops/content', 'none'); ?>
<?php endif; ?>