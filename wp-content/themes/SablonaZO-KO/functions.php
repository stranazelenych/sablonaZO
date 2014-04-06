<?php


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
    return $excerpt;
}



// počet slov v excerptu
function custom_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// změna vzhledu excerpt more
function new_excerpt_more( $more ) {
    return ' <a class="bold" href="'. get_permalink( get_the_ID() ) . '">více&raquo;</a>';
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
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

