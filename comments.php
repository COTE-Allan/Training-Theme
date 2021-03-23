<div id="commentaires" class="comments">
    <?php if (have_comments()) : ?>
        <h2 class="comments__title">
            <?php echo get_comments_number(); // Nombre de commentaires 
            ?> Commentaire(s)
        </h2>

        <div class="comment__list">
            <?php
            // La fonction qui liste les commentaires
            wp_list_comments(array(
                'style'       => 'div',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </div>

        <?php
        // S'il n'y a pas de commentaires
        if (!comments_open() && get_comments_number()) :
        ?>
            <p class="comments__none">
                <?php _e("Il n'y a pas de commentaires pour le moment. Soyez le premier à participer !", "futureimperfect") ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <?php comment_form(); // Le formulaire d'ajout de commentaire 
    ?>
</div>