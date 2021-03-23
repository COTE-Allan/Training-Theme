<!-- Main -->
<div id="main">
    <?php
    $postsTitle = getTheArchivesTitle();
    if (is_archive() || (is_search())) {
    ?>
        <h1 id="archiveTitle"><?= $postsTitle ?></h1>
    <?php
    }
    ?>
    <!-- Posts -->
    <!-- Boucle spéciale wordpress qui itère sur chaque post existant. -->
    <?php if (have_posts()) : while (have_posts()) : the_post();
            // Création des variables et récupération de certaines informations
            $categories = get_the_category();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $author_comments = get_comments();
            $category_id = get_cat_ID($categories[0]->name);
            $author_id = get_the_author_meta('ID');
    ?>
            <!-- Création du post en HTML -->
            <!-- Chaque balise "The" ou "get" sont des fonctions wordpress qui récupèrent les infos du post que la boucle spéciale wordpresss est en train de visualiser. -->
            <article class="post">
                <header>
                    <div class="title">
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="<?php the_time('d-m-Y'); ?>"><?php the_time(get_option('date_format')); ?></time>
                        <a href="<?= get_author_posts_url($author_id) ?>" class="fi_author"><span class="name"><?php the_author(); ?></span><img src="<?= get_avatar_url($author_id) ?>" alt="author-picture" /></a>
                    </div>
                </header>


                <?php
                if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="image featured"><img src="<?= $featured_img_url ?>" alt="featured-image" /></a>
                <?php endif ?>

                <p>
                    <?php the_excerpt(); ?>
                </p>
                <footer>
                    <ul class="actions">
                        <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="<?= get_category_link($category_id) ?>"><?php echo $categories[0]->name ?></a></li>
                        <li><a class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
                    </ul>
                </footer>
            </article>
            <!-- Il faut terminer cette boucle comme ceci -->
        <?php endwhile;
    else : ?>
        <h1 id="nofound"> <?php _e("La recherche n'a donné aucun résultat.", "futureimperfect") ?></h1>
    <?php endif; ?>

    <!-- Pagination variables -->
    <!-- Système de pagination. Je vérifie si il existe d'autre pages de post avant et après la page actuelle, j'affiche ensuite les boutons en fonction de si la page existe. Si la page n'existe pas le bouton possède la classe "disabled" -->
    <?php
    $nexturl = get_next_posts_page_link();
    $previousurl = get_previous_posts_page_link();
    if (is_search_has_results()) {
    ?>
        <!-- Pagination -->
        <!-- Utilisation d'une condition ternaire
    (condition ? true : false) -->
        <ul class="actions pagination">
            <li>
                <a class="button large previous <?php echo get_previous_posts_link() ? '' : 'disabled' ?>" href="<?= $previousurl ?>"><?php _e('<< Page précédente', 'futureimperfect') ?></a>
            </li>

            <li>
                <a class="button large previous <?php echo get_next_posts_link() ? '' : 'disabled' ?>" href="<?= $nexturl ?>"><?php _e('Page suivante >>', 'futureimperfect') ?></a>
            </li>

        </ul>
    <?php } ?>
</div>