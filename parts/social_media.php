<!-- Footer -->
<?php
// Variables Carbon Fields
$twitter = carbon_get_theme_option('crb_social_url_twitter');
$facebook = carbon_get_theme_option('crb_social_url_facebook');
$mail = 'mailto:' . antispambot(carbon_get_theme_option('crb_social_url_mail'), 1) . '?subject=Demande de contact"';
$insta = carbon_get_theme_option('crb_social_url_insta');
$rss = carbon_get_theme_option('crb_social_url_rss');

?>
<!-- HTML affichant les logos des réseaux, le lien est celui que l'utilisateur rentre dans carbon field. -->
<section id="footer">
    <ul class="icons">
        <li><a href="<?= $twitter['url'] ?>" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="<?= $facebook['url'] ?>" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="<?= $insta['url'] ?>" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
        <li><a href="<?= $mail ?>?subject=Demande de contact" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
    </ul>
    <!-- Crédits. -->
    <p class="copyright">&copy; Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
</section>