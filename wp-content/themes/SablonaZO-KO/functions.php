<?php

function add_scripts(){
// Load jQuery + jquerytools
   wp_deregister_script('jquery');
   wp_enqueue_script('jquery',"http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js",$deps, $ver, false);
   
// Your Scripts     ( $handle, $src, $deps, $ver, $in_footer );
   wp_enqueue_script('script1',get_bloginfo( 'stylesheet_directory' ).'/js/custom.js' ,$deps, $ver, true); 
}

if(!is_admin()){
  add_action('init', 'add_scripts');
}

function add_menus(){
	register_nav_menus( array(
		'primary' => __( 'Havní navigace')
  ) );
}

add_action( 'after_setup_theme', 'add_menus' );

add_theme_support( 'post-thumbnails' );


// ----------------- support checkboxu v custom fields
add_action( 'post_submitbox_misc_actions', 'publish_in_frontpage' );
function publish_in_frontpage($post)
{
    $value = get_post_meta($post->ID, '_publish_in_frontpage', true);
    echo '<div class="misc-pub-section misc-pub-section-last">
         <span id="timestamp">'
         . '<label><input type="checkbox"' . (!empty($value) ? ' checked="checked" ' : null) . 'value="1" name="publish_in_frontpage" /> Publish to frontpage</label>'
    .'</span></div>';
}

function save_postdata($postid)
{   
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
    if ( !current_user_can( 'edit_page', $postid ) ) return false;
    if(empty($postid) || $_POST['post_type'] != 'article' ) return false;

    if($_POST['action'] == 'editpost'){
        delete_post_meta($postid, 'publish_in_frontpage');
    }

    add_post_meta($postid, 'publish_in_frontpage', $_POST['publish_in_frontpage']);
}
// ------------------


// Add Read More link to manual excerpts.
/*
add_action('the_excerpt', 'child_add_manual_read_more', 20);
add_action('the_excerpt', 'child_add_time', 20);     

function child_add_manual_read_more($excerpt) {
if( is_home() || is_front_page() || is_page_template('archive.php')){
    if ( has_excerpt() ) {
 
        // Trim the newline.
        $excerpt = snippet(rtrim($excerpt),175,"...</p>");
 
        // Check for the <p> tags
        if ( '<p>' == substr($excerpt, 0, 3) && '</p>' == substr($excerpt, -4) )
            $excerpt = sprintf( '<p>%s <a href="%s" rel="nofollow" class="morelink">Celý článek >>></a></p>', substr($excerpt, 3, -4), get_permalink() );
    }
    return $excerpt;
}else{
    return $excerpt;
}
}

function snippet($text,$length=64,$tail="...") {
    $text = trim($text);
    $txtl = strlen($text);
    if($txtl > $length) {
        for($i=1;$text[$length-$i]!=" ";$i++) {
            if($i == $length) {
                return substr($text,0,$length) . $tail;
            }
        }
        $text = substr($text,0,$length-$i+1) . $tail;
    }
    return $text;
}

function child_add_time($excerpt) {
 
    if ( has_excerpt() ) {
 
        // Trim the newline.
        $excerpt = rtrim($excerpt);
 
        // Check for the <p> tags
        if ( '<p>' == substr($excerpt, 0, 3) && '</p>' == substr($excerpt, -4) )
            $excerpt = sprintf( '<p>%s %s</p>', '<span class="time" style="height: 20px; font: 12px Calibri; color: #666666;">'.get_the_time('j. F, Y').' v '.get_the_time('G:i').'</span>', substr($excerpt, 3, -4) );
    }
    return $excerpt;
}

*/

if(false === get_option("medium_crop")) {
    add_option("medium_crop", "1");
} else {
    update_option("medium_crop", "1");
}

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

