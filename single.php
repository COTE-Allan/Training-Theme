<?php
// Ajout de la partie header (commune aux pages)
get_header(); ?>

<!-- Main -->
<div id="main">

	<?php if (have_posts()) : while (have_posts()) : the_post();
			$categories = get_the_category();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$author_comments = get_comments();
			$category_id = get_cat_ID($categories[0]->name); ?>

			<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href="#"><?php the_title(); ?></a></h2>
					</div>
					<div class="meta">
						<time class="published" datetime="<?php the_time('d-m-Y'); ?>"><?php the_time(get_option('date_format')); ?></time>
						<a href="#" class="fi_author"><span class="name"><?php the_author(); ?></span><img src="<?= get_avatar_url(get_the_author_meta('ID')) ?>" alt="author-picture" /></a>
					</div>
				</header>
				<span class="image featured"><img src="<?= $featured_img_url ?>" alt="featured-image" /></span>
				<?php the_content(); ?>
				<hr>
				<?php comments_template(); // Par ici les commentaires 
				?>

				<footer>
					<ul class="stats">
						<li><a href="<?= get_category_link($category_id) ?>"><?php echo $categories[0]->name ?></a></li>
						<li><a class="icon solid fa-comment"><?php echo count($author_comments); ?></a></li>
					</ul>
				</footer>
			</article>
	<?php endwhile;
	else :
		echo "<p>Sorry, no posts matched your criteria.</p>";
	endif; ?>

</div>

<?php
// Ajout du footer social media (même code que pour les pages index.php, éditez tout en même temps via la page "Social Media.php")
include 'parts/social_media.php';
// Ajout de la partie footer (commune aux pages)
get_footer();
?>