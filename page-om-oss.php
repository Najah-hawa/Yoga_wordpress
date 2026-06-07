<?php 
get_header(); // Laddar in header.php (med meny och logotyp)
?>

<section class="about-page-hero">
    <div class="about-hero-content">
        <h1>Vår Historia & Vision</h1>
        <p>Välkommen till en oas mitt i vardagen. Vi skapade denna studio för att erbjuda en plats för återhämtning och gemenskap.</p>
    </div>
</section>

<section class="about-presentation">
    <div class="about-container">
        
        <?php
        // Startar standardloopen för att hämta texten som skrivs på sidan "Om oss" i WP-admin
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); 
            ?>
                
                <h2><?php the_title(); ?></h2>
                
                <?php the_content(); ?>

            <?php 
            endwhile;
        endif; 
        ?>

    </div>
</section>

<section class="team-section">
    <h2>Möt våra instruktörer</h2>
    <div class="team-grid">
        
        <?php
        // Skapar en anpassad loop för att hämta instruktörerna dynamiskt från Inlägg
        $team_query = new WP_Query(array(
            'category_name'  => 'instruktorer', // Hämtar bara inlägg med kategorin 'instruktorer'
            'posts_per_page' => -1              // -1 betyder att den visar ALLA instruktörer du skapar
        ));

        if ( $team_query->have_posts() ) :
            while ( $team_query->have_posts() ) : $team_query->the_post(); 
            ?>
                
                <div class="team-card">
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="team-image">
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3><?php the_title(); ?></h3>
                    
                    <?php the_content(); ?>
                    
                </div>

            <?php 
            endwhile;
            wp_reset_postdata(); // Återställer loopen
        else :
            echo '<p style="text-align: center; width: 100%;">Skapa inlägg i WP-admin med kategorin "instruktorer" för att visa dina lärare.</p>';
        endif;
        ?>

    </div>
</section>

<?php 
get_footer(); // Laddar in footer.php
?>