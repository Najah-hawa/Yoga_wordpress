<?php 
get_header(); // Laddar in header.php (meny, logotyp etc.)
?>

<section class="booking-page-hero">
    <div class="booking-hero-content">
        <h1>Boka din nästa klass</h1>
        <p>Investera i din egen tid och hälsa. Välj den klass som passar ditt schema bäst och fyll i formuläret nedan för att säkra din plats.</p>
    </div>
</section>

<section class="booking-section">
    <div class="booking-container">
        
        <div class="booking-form-wrapper">
            <h2>Bokningsförfrågan</h2>
            
            <?php
            // Standardloopen aktiveras för att hämta shortcode från WP-admin
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); 
                    
                    // Denna funktion läser av  shortcode 
                    // och omvandlar den till ett live, fungerande formulär på skärmen.
                    the_content(); 

                endwhile;
            endif; 
            ?>
        </div>

        <div class="booking-info">
            <h3>Viktig information</h3>
            <ul class="info-list">
                <li><strong>Avbokning:</strong> Måste ske senast 24 timmar innan klassens start, annars utgår full debitering.</li>
                <li><strong>Kom i tid:</strong> Dörrarna låses precis när klassen startar för att inte störa lugnet i salen. Kom gärna 10–15 minuter innan.</li>
                <li><strong>Utrustning:</strong> Mattor och block finns att låna på plats gratis, men du får självklart ta med din egen matta om du föredrar det.</li>
            </ul>
            
            <div class="contact-box">
                <h4>Behöver du hjälp?</h4>
                <p>Kontakta oss på info@yogastudio.se eller ring oss på 070-123 45 67 om du har frågor om din bokning.</p>
            </div>
        </div>

    </div>
</section>

<?php 
get_footer(); // Laddar in  footer.php
?>