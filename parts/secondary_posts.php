<section>
    <!-- Même chose que plus haut mais avec un html différent et sur un second choix de posts. -->
    <ul class="posts">
        <?php
        foreach (carbon_get_theme_option('crb_secondary_posts') as $post) {
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
            <!-- HTML dynamique. -->
            <li>
                <article>
                    <header>
                        <h3><a href="<?= $permalink ?>"><?= $title; ?></a></h3>
                        <time class="published" datetime="<?= $datetime ?>"><?= $date ?></time>
                    </header>
                    <a href="<?= $permalink ?>" class="image"><img src="<?= $picture ?>" alt="mini-post-featured-picture" class="mini-featured-image" /></a>
                </article>
            </li>
        <?php }
        ?>
    </ul>
</section>