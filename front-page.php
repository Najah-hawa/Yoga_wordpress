<?php 
get_header(); // Laddar in din header.php 
?>

<!-- HERO-SEKTION (Hårdkodad struktur/Dynamisk text) -->
<section class="hero-section">
    <div class="hero-container">
        <h1>Hitta ditt inre lugn</h1>
        <p>Välkommen till en plats för återhämtning, styrka och harmoni. Vi erbjuder yogaklasser för alla nivåer.</p>
        <a href="<?php echo home_url('/tjanster'); ?>" class="btn-hero">utforska klasser</a>
    </div>
</section>
<!-- puffar-SEKTION (Dynamisk loop) -->

<section class="events-section">
    <div class="scroll-container">
        
        <?php
        // Vi skapar en anpassad WP_Query för att hämta inläggen för puffarna
        $puff_query = new WP_Query(array(
            'category_name'  => 'puffar', // Hämtar inlägg som har kategorin 'puffar'
            'posts_per_page' => 3          // Visar max 3 puffar på rad
        ));

        if ( $puff_query->have_posts() ) :
            while ( $puff_query->have_posts() ) : $puff_query->the_post(); 
            ?>
                
                <div class="event-card">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="circle-icon">
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3><?php the_title(); ?></h3>
                    
                    <?php the_content(); ?>
                    
                </div>

            <?php 
            endwhile;
            wp_reset_postdata(); // Återställer loopen efteråt
        else :
            echo '<p style="text-align: center; width: 100%;">Skapa inlägg i WP-admin med kategorin "puffar" för att visa dem här.</p>';
        endif;
        ?>

    </div>
</section>


<section class="news-section">
    <h2>Senaste nytt</h2>
    <div class="scroll-container">
        
        <?php
        // Vi skapar en ny WP_Query för att bara hämta inlägg från kategorin 'nyheter'
        $news_query = new WP_Query(array(
            'category_name'  => 'nyheter', // Hämtar inlägg märkta med kategorin 'nyheter'
            'posts_per_page' => 3          // Visar max 3 nyhetskort på rad
        ));

        if ( $news_query->have_posts() ) :
            while ( $news_query->have_posts() ) : $news_query->the_post(); 
            ?>
                
                <div class="news-card">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="image-container">
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="meta">
                        <span><?php echo get_the_category()[0]->name; ?></span>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    
                    <h3><?php the_title(); ?></h3>
                    
                    <p><?php the_excerpt(); ?></p>
                    
                    <a href="<?php the_permalink(); ?>" class="arrow-link">Läs mer &rarr;</a>
                </div>

            <?php 
            endwhile;
            wp_reset_postdata(); // Återställer loopen
        else :
            echo '<p style="padding-left: 8%;">Inga nyheter publicerade ännu. Skapa inlägg med kategorin "nyheter".</p>';
        endif;
        ?>

        </div>
</section>

<?php 
get_footer(); // Laddar in din footer.php 
?>