<?php
/*===============================
  Disallow File Edit in Dashboard
=====================================*/
define('DISALLOW_FILE_EDIT', true);

/*===============================
  Hide WP Version Number
=====================================*/
function hideWPVersion(){
  remove_filter('update_footer', 'core_update_footer');
}

add_action('admin_menu', 'hideWPVersion');


/*===============================
  Add stylesheets and javascripts files
=====================================*/

function custom_theme_scripts(){
  //Boostrap CSS
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');

  //Main CSS
  wp_enqueue_style('main-styles', get_stylesheet_uri());

  wp_enqueue_script('jquery');

  //Javascript Files
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/scripts.js');
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');


/*===============================
  Adds Featured Images
=====================================*/
add_theme_support('post-thumbnails');

/*===============================
  Custom Header Image
=====================================*/
$custom_image_header = array(
  'width'   => 518,
  'height'  => 143,
  'uploads' => true,
);

add_theme_support('custom-header', $custom_image_header);


/*=========================================
  Post Data information
===========================================*/
function post_data(){
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');
  ?>

  <p>Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a> | Published on: <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a></p>
<?php }

/*=========================================


  Archive Sidebar


===========================================*/

function archiveSidebar(){?>
  <aside class="col-lg-3 archive-sidebar">
    <h2>Archives by Category:</h2>

    <ul class="category-list">
      <?php
        wp_list_categories(array(
          "orderby" => "name",
          "show_count" => true,
          "title_li" => "",
        ));
      ?>
    </ul>

    <h2>Archives by Tag:</h2>
    <ul class="tag-list">
      <?php
        $tags = get_tags();

        foreach($tags as $tag ){
          echo '<li><a href="' . get_tag_link($tag->term_id) . '" rel="tag">' . $tag->name . ' (' . $tag->count . ') </a></li>';
        }
      ?>
    </ul>

    <h2>Last 10 Post:</h2>

    <ul class="recent-posts">
      <?php
        $archive_10 = get_posts('numberposts=10');

        foreach($archive_10 as $post){ ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php }
      ?>
    </ul>

    <h2>Archives by Month:</h2>

    <ul class="monthly-list">
      <?php
        wp_get_archives(array(
          'type' => 'monthly',
          'show_post_count' => true,
        )); ?>
    </ul>
  </aside>
 <?php }

 /*=========================================


   Add menus to our theme


 ===========================================*/
 function register_my_menus(){
   register_nav_menus(array(
      'main-menu'     => __('Main Menu'),
      'footer-left'   => __('Left Footer Menu'),
      'footer-middle' => __('Middle Footer Menu'),
      'footer-right'  => __('Right Footer Menu')
    ));
 }

 add_action('init', 'register_my_menus');

/*=========================================


 Pagination Links


===========================================*/

function proPhotographyPagination(){
  global $wp_query;

  $big = 999999999; // need an unlikely integer
  $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

  echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
          'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
  ) );
}

/*=========================================


 Post Navigation


===========================================*/

function proPhotographyPostNavigation(){?>
  <div class="post-navigation-container row">
    <div class="previous-post-link col-sm-6">
      <?php previous_post_link(); ?>
    </div>

    <div class="next-post-link col-sm-6">
      <?php next_post_link(); ?>
    </div>
  </div>

<?php }


/*=========================================


 Create widget areas


===========================================*/

function blank_widgets_init(){
  register_sidebar(array(
    'name'          =>  ('Top Right Header'),
    'id'            =>  'top-right-header',
    'description'   =>  'Area in top right of header',
    'before_widget' =>  '<div class="top-right-header-container">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  register_sidebar(array(
    'name'          =>  ('Sidebar'),
    'id'            =>  'sidebar',
    'description'   =>  'Widget area in sidebar',
    'before_widget' =>  '<div class="sidebar">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  register_sidebar(array(
    'name'          =>  ('Home Left'),
    'id'            =>  'home-left',
    'description'   =>  'Widget area in archive sidebar',
    'before_widget' =>  '<div class="home-left">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  register_sidebar(array(
    'name'          =>  ('Home Middle'),
    'id'            =>  'home-middle',
    'description'   =>  'Widget area in archive sidebar',
    'before_widget' =>  '<div class="home-left">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  register_sidebar(array(
    'name'          =>  ('Home right'),
    'id'            =>  'home-right',
    'description'   =>  'Widget area in archive sidebar',
    'before_widget' =>  '<div class="home-right">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  register_sidebar(array(
    'name'          =>  ('CTA'),
    'id'            =>  'call-to-action',
    'description'   =>  'Widget area in CTA',
    'before_widget' =>  '<div class="home-cta">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));

  

  register_sidebar(array(
    'name'          =>  ('Archive Sidebar'),
    'id'            =>  'archive-sidebar',
    'description'   =>  'Widget area in archive sidebar',
    'before_widget' =>  '<div class="archive-sidebar">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));


  register_sidebar(array(
    'name'          =>  ('Left Footer'),
    'id'            =>  'left-footer',
    'description'   =>  'Widget area in left of footer',
    'before_widget' =>  '<div class="left-footer">',
    'after_widget'  =>  '</div>',
    'before_title'  =>  '<h3>',
    'after_title'   =>  '</h3>'
  ));
}

add_action('widgets_init', 'blank_widgets_init');

/**=========================================

  Register Custom Navigation Walker

 =============================================*/
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

/**=========================================

  Theme Settings

 =============================================*/
 function pro_photography_theme_settings_page(){ ?>
   <div class="wrap">
     <h1>Pro Photography Theme</h1>
     <p>Here you can set up your Facebook, Instagram, and Google Analytics accounts!</p>
     <p>More settings coming soon</p>

     <form method="post" action="options.php">
       <?php
        settings_fields('pro-photography-section'); //Register Section
        do_settings_sections('pro-photography-options'); //Group ID for all of the fields
        submit_button();
       ?>
     </form>
 <? }

 function display_instagram_element(){ ?>
   <input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" /><?php
 }

 function display_facebook_element(){ ?>
   <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" /><?php
 }

 function display_google_analytics_element(){ ?>
   <input type="text" name="google_analytics_code" id="google_analytics_code" value="<?php echo get_option('google_analytics_code'); ?>" /><?php
 }

 function display_theme_panel_fields(){
   add_settings_section('pro-photography-section', "All settings", null, 'pro-photography-options');

   add_settings_field('instagram_url', 'Instagram Profile URL', 'display_instagram_element', 'pro-photography-options', 'pro-photography-section');
   add_settings_field('facebook_url', 'Facebook Profile URL', 'display_facebook_element', 'pro-photography-options', 'pro-photography-section');
   add_settings_field('google_analytics_code', 'Google Analytics Tracking ID (example UA-1234567-1)', 'display_google_analytics_element', 'pro-photography-options', 'pro-photography-section');

   register_setting('pro-photography-section', 'instagram_url');
   register_setting('pro-photography-section', 'facebook_url');
   register_setting('pro-photography-section', 'google_analytics_code');
 }

 add_action('admin_init', 'display_theme_panel_fields');

 function add_theme_menu_item(){
   add_menu_page('Pro Photography Theme', 'Pro Photography Theme', 'manage_options', 'theme-panel', 'pro_photography_theme_settings_page', 'dashicons-camera-alt', 1);
 }

 add_action('admin_menu', 'add_theme_menu_item');

 /**=========================================

   Google Analytics

  =============================================*/
  function themeGoogleAnalytics(){
    $googleAnalytics = get_option('google_analytics_code');
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalytics; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo $googleAnalytics; ?>');
    </script>
  <?php }

  add_action('wp_head', 'themeGoogleAnalytics');





  /*----------------------------

  Registering Advanced Custom Fields

  ---------------------------- */

  if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
      'key' => 'group_618c10ff0c290',
      'title' => 'CTA',
      'fields' => array(
        array(
          'key' => 'field_618c11039cb5e',
          'label' => 'CTA Heading',
          'name' => 'cta-heading',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_618c11409cb5f',
          'label' => 'CTA Text',
          'name' => 'cta_text',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-hero.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => false,
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_618c05b0719f7',
      'title' => 'Left block',
      'fields' => array(
        array(
          'key' => 'field_618c06010bad9',
          'label' => 'Image',
          'name' => 'image-left',
          'type' => 'image',
          'instructions' => 'Add image',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_618c06320bada',
          'label' => 'Heading',
          'name' => 'heading-left',
          'type' => 'text',
          'instructions' => 'Add the heading for the left block',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_618c06620badb',
          'label' => 'Excerpt',
          'name' => 'excerpt-left',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 80,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-hero.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => false,
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_618c06bdc7eb5',
      'title' => 'Middle block',
      'fields' => array(
        array(
          'key' => 'field_618c06bdcd531',
          'label' => 'Image',
          'name' => 'image-middle',
          'type' => 'image',
          'instructions' => 'Add image',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_618c06bdd107d',
          'label' => 'Heading',
          'name' => 'heading-middle',
          'type' => 'text',
          'instructions' => 'Add the heading for the middle block',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_618c06bdd4c72',
          'label' => 'Excerpt',
          'name' => 'excerpt-middle',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 80,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-hero.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => false,
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_618c06bfd9cfa',
      'title' => 'Right block',
      'fields' => array(
        array(
          'key' => 'field_618c06bfdfce9',
          'label' => 'Image',
          'name' => 'image-right',
          'type' => 'image',
          'instructions' => 'Add image',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_618c06bfe387f',
          'label' => 'Heading',
          'name' => 'heading-right',
          'type' => 'text',
          'instructions' => 'Add the heading for the left block',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_618c06bfe7476',
          'label' => 'Excerpt',
          'name' => 'excerpt-right',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 80,
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-hero.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => false,
    ));
    
    acf_add_local_field_group(array(
      'key' => 'group_618c70f64fff0',
      'title' => 'Sub-headline',
      'fields' => array(
        array(
          'key' => 'field_618c70fdd3cdf',
          'label' => 'Sub Headline',
          'name' => 'sub_headline',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-hero.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'acf_after_title',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
    ));
    
    endif;		