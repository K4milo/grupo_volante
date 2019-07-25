<?php
/*
The Simple Posts Loop
=====================
*/
?> 

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <header class="header__top">
            <h2><?php the_title()?></h2>
        </header>
        <section class="container single-content">
            <?php the_content()?>
        </section>
    </article>
<?php endwhile; ?>
<?php endif; ?>