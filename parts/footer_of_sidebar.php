<?php
// Variables Carbon Fields
$title = carbon_get_theme_option('crb_about_title');
$text = carbon_get_theme_option('crb_about_text');
$button = carbon_get_theme_option('crb_about_button');
?>
<!-- Partie A propos, fonctionnement simple qui reprend juste les valeurs entrée par l'utilisateur sur carbon field. -->
<section class="blurb">
    <h2><?= $title ?></h2>
    <p><?= $text ?></p>
    <ul class="actions">
        <li><a href="<?= $button['url'] ?>" class="button"><?= $button['anchor'] ?></a></li>
    </ul>
</section>

<?php
include 'social_media.php'
?>