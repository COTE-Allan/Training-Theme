<?php
// Contenu du fichier functions.php
function my_theme_enqueue()
{
    wp_enqueue_style( // styles du parent
        get_template_directory_uri() . 'style.css'
    );
    // Ajout des 4 scripts
    // On supprime jQuery
    wp_deregister_script('jquery');
    // Déclarer jQuery
    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
        false,
        '3.5.1',
        true
    );
    // Browser
    wp_enqueue_script(
        'browser',
        get_template_directory_uri() . '/assets/js/browser.min.js',
        array('jquery'),
        '1.0',
        true
    );
    // Breakpoints
    wp_enqueue_script(
        'breakpoints',
        get_template_directory_uri() . '/assets/js/breakpoints.min.js',
        array('jquery'),
        '1.0',
        true
    );
    // Utils
    wp_enqueue_script(
        'util',
        get_template_directory_uri() . '/assets/js/util.js',
        array('jquery'),
        '1.0',
        true
    );
    // Main JS
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0',
        true
    );
    // =================
    // Css additonnel
    // =================
    wp_enqueue_style(
        'fontawesome_css',
        get_template_directory_uri() . '/assets/css/fontawesome-all.min.css',
        array(),
        rand(111, 9999),
        'all'
    );
    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        rand(111, 9999),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue');


// Menu
register_nav_menus(array(
    'main' => 'Menu Principal',
));
function prefix_nav_description($item_output, $item, $depth, $args)
{
    if (!empty($item->description)) {
        $item_output = str_replace($args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output);
    }

    return $item_output;
}

// CarbonFields
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('theme_options', __('Theme Options'))
        ->add_tab('Social', array(
            Field::make('urlpicker', 'crb_social_url_facebook', 'Facebook')
                ->set_help_text('Entrez votre URL Facebook'),
            Field::make('urlpicker', 'crb_social_url_twitter', 'Twitter')
                ->set_help_text('Entrez votre URL Twitter'),
            Field::make('urlpicker', 'crb_social_url_insta', 'Instagram')
                ->set_help_text('Entrez votre URL Instagram'),
            Field::make('text', 'crb_social_url_rss', 'Flux RSS')
                ->set_help_text('Entrez votre flux RSS'),
            Field::make('text', 'crb_social_url_mail', 'Adresse Email')
                ->set_help_text('Entrez votre mail de contact'),
        ))
        ->add_tab('Présentation', array(
            Field::make('text', 'crb_about_title', 'Titre')
                ->set_help_text('Entrez le titre de la section.')
                ->set_default_value('A propos'),
            Field::make('textarea', 'crb_about_text', 'Texte')
                ->set_help_text('Présentez votre site ici.')
                ->set_default_value('Je suis une zone de texte !'),
            Field::make('urlpicker', 'crb_about_button', 'Bouton')
                ->set_help_text('Entrez les informations du bouton de redirection.'),
        ))
        ->add_tab('Articles mis en avant', array(
            Field::make('association', 'crb_main_posts')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'post',
                    ),
                ))
                ->set_help_text('Choissisez 4 articles à mettre en avant.')
                ->set_max(4)
        ))
        ->add_tab('Articles secondaires', array(
            Field::make('association', 'crb_secondary_posts')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'post',
                    ),
                ))
                ->set_help_text('Choissisez 5 articles à mettre en avant de manière secondaire.')
                ->set_max(5)
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


// Vérifie si la recherche à trouver des posts
function is_search_has_results()
{
    return 0 != $GLOBALS['wp_query']->found_posts;
}
function getTheArchivesTitle()
{
    $return_value = '';
    $author_text = _("Dans les articles de l'auteur ", "futureimperfect");
    $category_text = _("Dans les articles de la catégorie ", "futureimperfect");
    $date_text = _("Dans les articles datant du ", "futureimperfect");
    $search_text = _("Les articles correspondant avec ", "futureimperfect");
    if (is_author()) {
        $return_value = $author_text . get_the_author();
        return $return_value;
    } elseif (is_category()) {
        $return_value = $category_text . single_cat_title("", false);
        return $return_value;
    } elseif (is_date()) {
        $return_value = $date_text . get_the_time(get_option("date_format"));
        return $return_value;
    } elseif (is_search()) {
        $return_value = $search_text . get_search_query();
        return $return_value;
    }
}
