<?php
// Ajout de la partie header (commune aux pages)
get_header();
// Ajout de la partie main avec les articles récents
include 'parts/main_part.php';
// Ajout de la partie sidebar avec les mini-posts
include 'parts/custom_sidebar.php';
// Ajout de la partie footer (commune aux pages)
get_footer();
