<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <!-- Section Titre du site / Logo du site et Slogan du Site. -->
    <section id="intro">
        <a href="index.php" class="logo"><img src="<?= get_site_icon_url() ?>" alt="" /></a>
        <header>
            <h2><?php echo get_bloginfo("name") ?></h2>
            <p><?php echo get_bloginfo("description") ?></p>
        </header>
    </section>

    <!-- Posts mis en avant -->
    <!-- Les posts sont sur le ASIDE de la page, ce sont des posts mis en avant par l'utilisateur, il choisi les posts souhaités.
    Primary Posts contient les posts affichés en taille "moyenne" secondary possède les posts ressemblant à une liste de taille "petite" -->
    <!-- Mini Posts -->
    <?php include 'primary_posts.php' ?>

    <!-- Posts List -->
    <?php include 'secondary_posts.php' ?>

    <!-- About -->
    <?php include 'footer_of_sidebar.php' ?>

</section>