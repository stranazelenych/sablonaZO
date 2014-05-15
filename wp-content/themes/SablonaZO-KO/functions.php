<?php

// úprava pro to, aby author mohl vkládat HTML embed
$role = get_role( 'author' );

// -> druhá podmínka pro to samé -> 
$role->add_cap( 'unfiltered_html' );


// skripty
function add_scripts(){
// Load jQuery + jquerytools
   wp_deregister_script('jquery');
   wp_enqueue_script('jquery',"http://code.jquery.com/jquery-1.11.0.min.js",$deps, $ver, false);

// Your Scripts     ( $handle, $src, $deps, $ver, $in_footer );
   wp_enqueue_script('script1',get_bloginfo( 'stylesheet_directory' ).'/js/custom.js' ,$deps, $ver, true);
   wp_enqueue_script('flexnav', get_bloginfo('stylesheet_directory').'/js/jquery.flexnav.min.js');
}

if(!is_admin()){
  add_action('init', 'add_scripts');
}

// nastavení supportů šablony
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) { 
    
    // Featured image on the homepage
    add_image_size( "article-featured", 460, 260, true );
    add_image_size( "article-full", 705 );
}


// registrace lokací menu
function add_menus(){
    register_nav_menus( array(
        'primary' => __( 'Havní navigace'),
        'info-line' => __('Proužek s dalšími informacemi')
  ) );
}

add_action( 'after_setup_theme', 'add_menus' );


// widget areas
function add_widget_areas(){
    register_sidebar( array(
        'name' => __('Proužek s dalšími informacemi'),
        'id' => 'info-line',
        'before_widget' => '<div class="search">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Úvod - pravý sloupec, levá část'),
        'id' => 'home-column-first',
        'before_widget' => '<div class="feed box">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Úvod - pravý sloupec, pravá část'),
        'id' => 'home-column-second',
        'before_widget' => '<div class="feed box">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Hlavní stránka - nahoře vlevo'),
        'id' => 'home-top-left',
        'before_widget' => '<div class="hometop box sedy">',
        'after_widget' => '</div>',

    ));
    register_sidebar( array(
        'name' => __('Hlavní stránka - nahoře vpravo'),
        'id' => 'home-top-right',
        'before_widget' => '<div class="hometop right">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Akční box - dole vlevo'),
        'id' => 'action-box-info',
        'before_widget' => '<div class="hometop right">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Akční box - dole vpravo'),
        'id' => 'action-box-fundraising',
        'before_widget' => '<div class="hometop right">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Menu v patičce'),
        'id' => 'footer-menu',
        'before_widget' => '<div class="footer-menu">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Text v patičce'),
        'id' => 'footer-text',
        'before_widget' => '<div class="footer-text">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Sidebar post/page'),
        'id' => 'post-page-right',
        'before_widget' => '<div class="feed box">',
        'after_widget' => '</div>',
    ));
    register_sidebar( array(
        'name' => __('Box pod článkem'),
        'id' => 'box-under-post',
        'before_widget' => '<div class="widget under-post">',
        'after_widget' => '</div>',
    ));
}

add_action( 'widgets_init', 'add_widget_areas' );


// automatické přidání času na začátek excerptu
add_action('the_excerpt', 'child_add_time', 20);
function child_add_time($excerpt) {


        // Trim the newline.
        $excerpt = rtrim($excerpt);

        // Check for the <p> tags
        if ( '<p>' == substr($excerpt, 0, 3) && '</p>' == substr($excerpt, -4) )
            $excerpt = sprintf( '<p>%s %s</p>', '<span class="date">'.get_the_time('j. n. Y') . '&nbsp;&nbsp;|&nbsp;</span>', substr($excerpt, 3, -4) );
            $excerpt = sprintf( '<p>%s %s</p>', substr($excerpt, 3, -4) , '<a href='.get_permalink() . ' class="bold">více&raquo</a>' );
    return $excerpt;
}



// počet slov v excerptu
function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// změna vzhledu excerpt more
function new_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// paginace
function paginate($pages = '', $range = 2)
{
     $showitems = ($range * 2);

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
//         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 /*&& $showitems < $pages*/) echo "<a href='".get_pagenum_link($paged - 1)."'>&laquo; Předchozí stránka</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages /*&& $showitems < $pages*/) echo "<a href='".get_pagenum_link($paged + 1)."'>Další stránka &raquo;</a>";
//         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

