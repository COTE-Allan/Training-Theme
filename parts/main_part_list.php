<!-- Main -->
<div id="main">
    <?php
    $postsTitle = getTheArchivesTitle();
    if (is_archive() || (is_search())) {
    ?>
        <h1 id="archiveTitle"><?= $postsTitle ?></h1>
    <?php
    }
    // The Query
    $args = [
        's' => get_search_query(),
        'posts_per_page' => 50,

    ];
    $the_query = new WP_Query($args);
    // The Loop
    if ($the_query->have_posts()) { ?>
        <div class="post">
            <?php
            while ($the_query->have_posts()) :
                // Création des variables et récupération de certaines informations
                $the_query->the_post();
                $categories = get_the_category();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $author_comments = get_comments();
                $category_id = get_cat_ID($categories[0]->name);
                $author_id = get_the_author_meta('ID');
            ?>
                <!-- Création du post en HTML -->
                <!-- Chaque balise "The" ou "get" sont des fonctions wordpress qui récupèrent les infos du post que la boucle spéciale wordpresss est en train de visualiser. -->
                <div>

                    <h2 class="list-Title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p>
                        <time class="published" datetime="<?php the_time('d-m-Y'); ?>"><?php the_time(get_option('date_format')); ?></time>
                    </p>

                </div>
                <!-- Il faut terminer cette boucle comme ceci -->
            <?php
            endwhile; ?>
        </div>
    <?php
        /* Restore original Post Data */
        wp_reset_postdata();
    } else { ?>
        <h1 id="nofound"> <?php _e("La recherche n'a donné aucun résultat.", "futureimperfect") ?></h1>
    <?php }
    ?>

    <!-- Pagination variables -->
    <!-- Système de pagination. Je vérifie si il existe d'autre pages de post avant et après la page actuelle, j'affiche ensuite les boutons en fonction de si la page existe. Si la page n'existe pas le bouton possède la classe "disabled" -->
    <?php
    $nexturl = get_next_posts_page_link();
    $previousurl = get_previous_posts_page_link();
    if (is_search_has_results()) {
    ?>
    <?php } ?>
</div>