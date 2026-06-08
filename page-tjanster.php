<?php 
get_header(); // Laddar in header.php (med meny och logotyp)
?>

<section class="services-page-hero">
    <div class="services-hero-content">
        <h1>Våra Tjänster & Klasser</h1>
        <p>Vi erbjuder ett brett utbud av klasser anpassade för både kropp och sinne. Hitta den form som passar just dig.</p>
    </div>
</section>

<section class="services-list">
    <div class="services-container">
        
        <?php
        // Vi skapar en anpassad loop för att hämta inlägg från kategorin 'tjanster'
        // 'order' => 'ASC' gör att de äldsta inläggen visas först 
        $services_query = new WP_Query(array(
            'category_name'  => 'tjanster', 
            'posts_per_page' => -1,          
            'order'          => 'ASC'        
        ));

        if ( $services_query->have_posts() ) :
            $counter = 0; //  skapar en räknare för att kunna lägga till klassen 'reverse'

            while ( $services_query->have_posts() ) : $services_query->the_post(); 
                
                // Om räknaren är ett ojämnt nummer lägger vi till "reverse", annars är den tom
                $row_class = ($counter % 2 !== 0) ? 'service-row reverse' : 'service-row';
                ?>
                
                <div class="<?php echo esc_attr($row_class); ?>">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-text">
                        <h2><?php the_title(); ?></h2>
                        
                        <?php the_content(); ?>
                    </div>

                </div>

            <?php 
                $counter++; // Öka räknaren med 1 för nästa rad
            endwhile;
            wp_reset_postdata(); // Återställ loopen
        else :
            echo '<p style="text-align: center;">Inga tjänster hittades. Skapa inlägg med kategorin "tjanster" i WP-admin.</p>';
        endif;
        ?>

<?php 
get_footer(); // Detta anrop sköter footern
?>