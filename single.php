<?php 
get_header(); // Detta anrop sköter FÖRSTA menyn och logotypen
?>

<main class="single-article-container">
    <a href="<?php echo home_url('/nyheter'); ?>" class="back-link">&larr; Tillbaka till alla nyheter</a>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); 
        ?>

            <article class="full-article">
                <div class="meta">
                    <span>
                        <?php 
                        $categories = get_the_category();
                        $display_cat = 'Nyhet';
                        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                            foreach($categories as $cat) {
                                if($cat->slug !== 'nyheter') {
                                    $display_cat = $cat->name;
                                    break;
                                }
                            }
                        }
                        echo esc_html($display_cat);
                        ?>
                    </span>
                    <span><?php echo get_the_date(); ?></span>
                </div>
                
                <h1><?php the_title(); ?></h1>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="article-hero-image">
                        <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                    </div>
                <?php endif; ?>

                <div class="article-content">
                    <?php the_content(); ?>
                </div>
            </article>

        <?php 
        endwhile;
    endif;
    ?>
</main>

<?php 
get_footer(); // Detta anrop sköter footern
?>