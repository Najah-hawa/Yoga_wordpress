# Yoga Studio Hälsocenter – Dynamiskt WordPress-tema

Detta projekt omfattar utvecklingen av ett dynamiskt WordPress-tema för **Yoga Studio Hälsocenter**. Temat är byggt från grunden med fokus på semantisk kodstruktur, hög prestanda och digital tillgänglighet i enlighet med WCAG-riktlinjerna.

## 🚀 Funktioner & Implementation (WordPress-delen)

* **Modulär Arkitektur (DRY):** Webbplatsens struktur har brutits ut till globala komponenter (`header.php` och `footer.php`) för att eliminera duplicerad kod. Systemresurser laddas korrekt via `wp_head()` och `wp_footer()`.
* **Mallhierarki (Template Hierarchy):**
    * `front-page.php`: Renderar en unik startsida med dynamiska puffar och nyhetskort.
    * `page-tjanster.php`: Visar studions utbud med en dynamisk sicksack-layout (bild/text spegelvänds på varannan rad via en PHP-modulusräknare).
    * `page-om-oss.php`: Kombinerar statiskt innehåll med ett dynamiskt instruktörs-grid.
    * `page-boka.php`: Integrerar ett interaktivt bokningsformulär via kortkoder (shortcodes).
    * `single.php`: Dedikerad fulltextmall för enskilda nyhetsinlägg och artiklar.
* **Dynamiska Dataflöden (`WP_Query`):** Innehåll, utvalda bilder (`the_post_thumbnail`), rubriker och textutdrag hämtas dynamiskt från MySQL-databasen med anpassade loopar. Globala variabler återställs korrekt med `wp_reset_postdata()`.
* **Temalogik (`functions.php`):**
    * Säker köhantering av CSS (`main.css`) och JavaScript (`script.js`) via `wp_enqueue_scripts`.
    * Registrering av dynamisk navigeringsmeny (`register_nav_menus`).
    * Prestandaoptimering genom anpassade bildstorlekar (`puff-thumb` och `news-thumb`).
    * Textmanipulering via filter (`excerpt_length` begränsat till 18 ord, samt anpassat `excerpt_more`).
    * Automatiserad serverkomprimering av JPG-bilder till 80 % kvalitet för snabbare laddningstider.

## 🛠️ Installation & Driftsättning

1.  Flytta temamappen till din WordPress-installation: `/wp-content/themes/yogastudio/`.
2.  Aktivera temat via WordPress-administratörspanelen (**Utseende > Teman**).
3.  **Inställningar i WP-admin:**
    * Skapa en tom sida med titeln "Hem" och en med titeln "Nyheter".
    * Gå till **Inställningar > Läsa**, välj "En statisk sida" och sätt startsidan till "Hem".
    * Skapa inläggskategorierna `Puffar`, `Nyheter`, `Tjänster` och `Instruktörer` för att strömma innehållet dynamiskt till respektive sida.
4.  Installera och konfigurera ett formulärtillägg (t.ex. *Contact Form 7*) och klistra in kortkoden på sidan "Boka".

---
*Utvecklat av Najah Hawa som en del av kursen DT209G, Mittuniversitetet VT 2026.*