<?php
/*
The Single Services Posts Loop
=====================
fields

service_items
    service_items_title
    service_items_text
    service_items_image
    service_items_catalog
    service_items_catalog_image
    

    service_items_ext
        service_items_ext_icon
        service_items_ext_title
        service_items_ext_image
        service_items_ext_text

*/

    // General Variables

    $service_items = get_field('service_items');
    $count = 0;
    $count0 = 0;
    $count1 = 0;
    $count2 = 0;
    $classesArray;

    global $post;

?> 

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <header class="header__top">
            <img src="<?php the_field('service_logo'); ?>" alt="<?php the_title(); ?>">
            <h3><?php the_title(); ?></h3>
        </header>
        <section id="ContentService" class="service-content container">
            <div class="service-content__content">
                <?php the_content();?>
            </div>
            <div class="service-content__image">
                <figure style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></figure>
            </div>            
        </section>
        <?php 
            if($service_items): 
                    
            ?>
            <section id="Atrributes"  class="service-attributes">
                <ul class="nav nav-tabs service-attributes-nav-tabs container">
                    <?php 
                        while(have_rows('service_items')): the_row();

                            if($count == 0):
                                $classesArray = 'active';
                            else:    
                                $classesArray = '';
                            endif;
                    ?>
                        <li class="<?php echo $classesArray; ?>"><a data-toggle="tab" href="#service-<?php echo $count; ?>"><?php the_sub_field('service_items_title'); ?></a></li>
                    <?php $count++; endwhile; ?>
                </ul>
                <div class="tab-content container">
                    <?php 
                        while(have_rows('service_items')): the_row();

                            $service_items_ext = get_sub_field('service_items_ext');
                            $service_items_image = get_sub_field('service_items_image');
                            $service_items_catalog = get_sub_field('service_items_catalog');
                            $service_items_catalog_image = get_sub_field('service_items_catalog_image');

                            if($count0 == 0):
                                $classesArray = 'active in';
                            else:    
                                $classesArray = '';
                            endif;

                        ?>
                        <div id="service-<?php echo $count0; ?>" class="tab-pane fade <?php echo $classesArray;?>">
                            <?php if($service_items_image):?>
                                <div class="tab-pane__with-thumb">
                                <figure class="tab-pane__thumb">
                                    <img src="<?php echo $service_items_image; ?>" alt="<?php the_sub_field('service_items_title'); ?>">
                                </figure>
                            <?php endif; ?>
                                <div class="tab-pane__text">
                                    <h3><?php the_sub_field('service_items_title'); ?></h3>
                                    <?php the_sub_field('service_items_text'); ?>
                                </div>
                            <?php if($service_items_image):?>
                                </div>
                            <?php endif; ?>
                            
                            <?php
                                // Nested services pills
                            if($service_items_ext && $post->ID != 33):
                                
                            ?>
                                <div class="tab-content__ext">
                                    <nav class="tab-content__ext-menu">
                                        <ul class="nav nav-tabs service-attributes-nav-tabs__internal">
                                            <?php 
                                                while(have_rows('service_items_ext')): the_row();

                                                    if($count1 == 0):
                                                        $classesArray = 'active';
                                                    else:    
                                                        $classesArray = '';
                                                    endif;
                                            ?>
                                                <li class="<?php echo $classesArray; ?>"><a data-toggle="tab" href="#service-internal-<?php echo $count0.'_'.$count1; ?>"><?php the_sub_field('service_items_ext_title'); ?></a></li>
                                            <?php $count1++; endwhile; ?>
                                        </ul>
                                    </nav>   

                                    <div class="tab-content tab-content__ext-side">
                                        <?php 
                                            while(have_rows('service_items_ext')): the_row();

                                                // Internal vars
                                                $service_items_ext_title = get_sub_field('service_items_ext_title');
                                                $service_items_ext_icon = get_sub_field('service_items_ext_icon');
                                                $service_items_ext_image = get_sub_field('service_items_ext_image');
                                                $service_items_ext_text = get_sub_field('service_items_ext_text');

                                                if($count2 == 0):
                                                    $classesArray = 'active in';
                                                else:    
                                                    $classesArray = '';
                                                endif;

                                            ?>
                                            <div id="service-internal-<?php echo $count0.'_'.$count2; ?>" class="tab-pane fade <?php echo $classesArray; ?>">
                                                <h4> <?php echo $service_items_ext_title; ?></h4>
                                                <?php echo $service_items_ext_text; ?>
                                            </div>

                                        <?php $count2++;
                                            endwhile; ?>
                                    </div>
                                </div>

                            <?php elseif($post->ID == 33): ?>

                                    <div class="tab-content tab-content__ext-grouped">
                                        <?php 
                                            while(have_rows('service_items_ext')): the_row();

                                                // Internal vars
                                                $service_items_ext_title = get_sub_field('service_items_ext_title');
                                                $service_items_ext_icon = get_sub_field('service_items_ext_icon');
                                                $service_items_ext_image = get_sub_field('service_items_ext_image');
                                                $service_items_ext_text = get_sub_field('service_items_ext_text');

                                                if($count2 == 0):
                                                    $classesArray = 'active in';
                                                else:    
                                                    $classesArray = '';
                                                endif;

                                            ?>
                                            <div id="service-internal-<?php echo $count0.'_'.$count2; ?>" class="tab-content tab-content__ext-grouped__item">
                                                <h4><?php echo $service_items_ext_title; ?></h4>
                                                <?php echo $service_items_ext_text; ?>
                                            </div>

                                        <?php $count2++;
                                            endwhile; ?>
                                    </div>
                            
                            <?php endif;?>                

                        </div>
                    <?php $count0++; endwhile; ?>
                </div>
            </section>
        <?php endif;?>
    </article>

<?php endwhile; ?>
<?php else: get_template_part('includes/loops/content', 'none'); ?>
<?php endif; ?>