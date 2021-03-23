<section>
    <div class="mini-posts">

        <!-- Je boucle manuellement sur les posts choisis par l'utilisateur via carbon field. Je chope l'ID et je chope le contenu des posts en fonction de l'ID.
            J'itère sur chaque ID. -->
        <?php
        foreach (carbon_get_theme_option('crb_main_posts') as $post) {
            // Variables des contenus.
            $id = $post['id'];
            $author_id =  get_post_field('post_author', $id);
            $author_image = get_avatar_url($author_id);
            $title = get_the_title($id);
            $permalink = get_the_permalink($id);
            $date = get_the_date(get_option('date_format'), $id);
            $datetime = get_the_date('d-m-Y', $id);
            $picture = get_the_post_thumbnail_url($id);
        ?>
            <!-- HTML Dynamique. -->
            <article class="mini-post">
                <header>
                    <h3><a href="<?= $permalink ?>"><?= $title; ?></a></h3>
                    <time class="published" datetime="<?= $datetime ?>"><?= $date ?></time>
                    <a href="#" class="fi_author"><img src="<?= $author_image ?>" alt="author-image" /></a>
                </header>
                <a href="<?= $permalink ?>" class="image"><img src="<?= $picture ?>" alt="post-featured-picture" /></a>
            </article>
        <?php }
        ?>
    </div>
</section>