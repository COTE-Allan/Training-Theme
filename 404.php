<?php
// Ajout de la partie header (commune aux pages)
get_header(); ?>

<!-- Main -->
<div id="main" class="errorWrapper">
    <div class="portfolio-experiment">
        <h1 class="notFoundTitle experiment-title">404</h1>
        <p><?php _e('Ahah, la page est introuvable...', 'futureimperfect') ?></p>
        <ul class="actions">
            <li><a href="<?php echo home_url('/') ?>" class="button large">Retourner à l'accueil</a></li>
        </ul>
    </div>


    <!-- <p class="labelerror"><?php _e('Vous pouvez aussi effectuez une autre recherche :', 'futureimperfect') ?></p>
    <form id="search" method="get" action="<?php echo home_url('/'); ?>">
        <input type="text" name="query" placeholder="Search" />
    </form> -->
</div>

<?php
// Ajout du footer social media (même code que pour les pages index.php, éditez tout en même temps via la page "Social Media.php")
include 'parts/social_media.php';
// Ajout de la partie footer (commune aux pages)
get_footer();
?>