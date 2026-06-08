<?php 
get_header(); // Laddar in header.php
?>

<section class="news-page-hero">
    <div class="news-hero-content">
        <h1>Studiobloggen & Nyheter</h1>
        <p>Håll dig uppdaterad med senaste nytt från studion, läs inspirerande artiklar om hälsa och få tips för din dagliga praktik.</p>
    </div>
</section>

<section class="news-feed-section">
    <div class="news-feed-grid">
        
        <?php
        // Vi skapar en anpassad Query för att ENBART hämta inlägg från kategorin 'nyheter'
        $news_feed_query = new WP_Query(array(
            'category_name'  => 'nyheter', // Visar bara inlägg märkta med huvudkategorin 'nyheter'
            'posts_per_page' => 10          // Hur många nyheter du vill visa per sida innan de tar slut
        ));

        if ( $news_feed_query->have_posts() ) :
            while ( $news_feed_query->have_posts() ) : $news_feed_query->the_post(); 
            ?>
                
                <div class="feed-card">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="feed-image">
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="meta">
                        <span>
                            <?php 
                            $categories = get_the_category();
                            $display_cat = 'Nyhet'; // Standard fallback
                            
                            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                                foreach($categories as $cat) {
                                    // Vi letar efter underkategorin (t.ex. Kurs, Tips, Event) och hoppar över själva ordet 'nyheter'
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
                    
                    <h2><?php the_title(); ?></h2> <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="arrow-link">Läs hela artikeln &rarr;</a>
                </div>

            <?php 
            endwhile;
            wp_reset_postdata(); // Återställer huvudloopen efter vår anpassade query
        else :
            echo '<p style="grid-column: 1/-1; text-align: center;">Inga nyheter hittades. Skapa inlägg med kategorin "nyheter" i WP-admin.</p>';
        endif;
        ?>

    </div> </section> <?php 
get_footer(); // Laddar in footer.php
?>