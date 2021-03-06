<?php

function register_custom_clients_and_taxonomies(){
  add_theme_support( 'post-thumbnails' );
  $labels = array(
    'name'          =>  'Clients',
    'singular_name' =>  'Client',
    'add_new'       =>  _x('Add New Client', 'Client'),
    'add_new_item'  =>  'Add Client',
    'edit_item'     =>  'Edit Client',
    'new_item'      =>  'New Client',
    'view_item'     =>  'View Client',
    'search_items'  =>  'Search Portfolio',
    'not_found'     =>  'No Clients Found',
    'not_found_in_trash' => 'No Clients found in Trash',
    'all_items'     =>  'View All Clients',
    'archives'      =>  'Portfolio',
    'insert_into_item'  =>  'Insert Into Client\'s Portfolio',
    'uploaded_to_this_item' => 'Uploaded to this Client\'s Portfolio',
    'menu_name'     =>  'Portfolio',
    'name_admin_bar'=>  'Portfolio'
  );

  register_post_type('clients',
    array(
      'description' => 'Portfolio for all the website work',
      'has_archive' => false,
      'labels'      => $labels,
      'menu_position' => 2,
      'public'      => true,
      'publicly_queryable' =>true,
      'rewrite'     => array(
        'slug'      => 'portfolio'
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true,
      'taxonomies'  => array('post_tag')
    )
  );

  // Trying to add Portfolio

  // $labels = array(
  //   'name'          => 'Services',
  //   'singular_name' => 'Service',
  //   'add_new'       =>  _x('Add Service', 'Service'),
  //   'add_new_item'  =>  'Add Service',
  //   'edit_item'     =>  'Edit Service',
  //   'new_item'      =>  'New Service',
  //   'view_item'     =>  'View Service',
  //   'search_items'  =>  'Search Services',
  //   'not_found'     =>  'No Services Found',
  //   'not_found_in_trash' => 'No Services found in Trash',
  //   'all_items'     =>  'View All Services',
  //   'archives'      =>  'Services',
  //   'insert_into_item'  =>  'Insert Into Service',
  //   'uploaded_to_this_item' => 'Uploaded to this Service',
  //   'menu_name'     =>  'Services',
  //   'name_admin_bar'=>  'Services'
  // )

  //   register_post_type('services',
  //   array(
  //     'description' => 'Services we provide',
  //     'has_archive' => false,
  //     'labels'      => $labels,
  //     'menu_position' => 5,
  //     'public'      => true,
  //     'publicly_queryable' =>true,
  //     'rewrite'     => array(
  //       'slug'      => 'services'
  //       ),
  //     'supports'    => array(
  //       'title',
  //       'editor',
  //       'thumbnail',
  //       'excerpt',
  //       'custom-fields',
  //       ),
  //     'show_ui'     => true,
  //     'taxonomies'  => array('post_tag')
  //   )
  // );

  $labels = array(
    'name'          =>  'Team Members',
    'singular_name' =>  'Team Member',
    'add_new'       =>  _x('Add New Member', 'Member'),
    'add_new_item'  =>  'Add Team Member',
    'edit_item'     =>  'Edit Team Member',
    'new_item'      =>  'New Team Member',
    'view_item'     =>  'View Team Member',
    'search_items'  =>  'Search Bios',
    'not_found'     =>  'No Team Members Found',
    'not_found_in_trash' => 'No Team Members found in Trash',
    'all_items'     =>  'View All Members',
    'archives'      =>  'Team Members',
    'insert_into_item'  =>  'Insert Into Team Members\'s Biography',
    'uploaded_to_this_item' => 'Uploaded to this Team Member\'s Biography',
    'menu_name'     =>  'Team Bios',
    'name_admin_bar'=>  'Team Members'
  );

  register_post_type('members',
    array(
      'description' => 'Biography\'s for each team member',
      'has_archive' => false,
      'labels'      => $labels,
      'menu_position' => 3,
      'public'      => true,
      'publicly_queryable' =>true,
      'rewrite'     => array(
        'slug'      => 'members'
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true,
      'taxonomies'  => array('post_tag')
    )
  );

  $labels = array(
    'name'              => _x( 'Industries', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Industry', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Search Industries', 'textdomain' ),
    'all_items'         => __( 'All Industries', 'textdomain' ),
    'parent_item'       => __( 'Parent Industry', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Industry:', 'textdomain' ),
    'edit_item'         => __( 'Edit Industry', 'textdomain' ),
    'update_item'       => __( 'Update Industry', 'textdomain' ),
    'add_new_item'      => __( 'Add New Industry', 'textdomain' ),
    'new_item_name'     => __( 'New Industry Name', 'textdomain' ),
    'menu_name'         => __( 'Industries', 'textdomain' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'industries' ),
  );

  register_taxonomy( 'industries', array( 'clients' ), $args );

  $labels = array(
    'name'              => _x( 'Services', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Service', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Search Services', 'textdomain' ),
    'all_items'         => __( 'All Services', 'textdomain' ),
    'parent_item'       => __( 'Parent Service', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Service:', 'textdomain' ),
    'edit_item'         => __( 'Edit Service', 'textdomain' ),
    'update_item'       => __( 'Update Service', 'textdomain' ),
    'add_new_item'      => __( 'Add New Service', 'textdomain' ),
    'new_item_name'     => __( 'New Service Name', 'textdomain' ),
    'menu_name'         => __( 'Services', 'textdomain' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'services' ),
  );

  register_taxonomy( 'services', array( 'clients' ), $args );
}

function asset_pipeline(){
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dist/bootstrap/css/bootstrap.css');
  wp_enqueue_style('slick', get_template_directory_uri() . '/dist/js/slick/slick.css');
  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/dist/js/slick/slick-theme.css');
  wp_register_script('slick', get_template_directory_uri() . '/dist/js/slick/slick.js', array('jquery'), null, true);
  wp_register_script('jquery-min', get_template_directory_uri() . '/dist/js/jquery-3.1.1.min.js', array(), null, true);
  wp_register_script('index', get_template_directory_uri() . '/index.js', array(), null, true);
  wp_register_script('home', get_template_directory_uri() . '/dist/js/home.js', array(), null, true);
  wp_register_script('about', get_template_directory_uri() . '/dist/js/about.js', array(), null, true);
  wp_register_script('portfolio', get_template_directory_uri() . '/dist/js/portfolio.js', array(), null, true);
  wp_register_script('portfolio-single', get_template_directory_uri() . '/dist/js/portfolio-single.js', array(), null, true);
  wp_register_script('blog', get_template_directory_uri() . '/dist/js/blog.js', array(), null, true);
  wp_register_script('blog-single', get_template_directory_uri() . '/dist/js/blog-single.js', array(), null, true);

  wp_localize_script( 'index', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
  wp_localize_script( 'filter', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

  wp_enqueue_script('jquery-min');
  wp_enqueue_script('slick');

  if(is_page( 'about' )){
    wp_enqueue_script('about');
  }
  if(is_page( 'blog' )){
    wp_enqueue_script('blog');
  }
  if(is_page( 'services' )){
    wp_enqueue_script('filter');
  }
  if(is_page('portfolio')){
    wp_enqueue_script('portfolio');
  }
  if(is_home()){
    wp_enqueue_script('home');
  }
  if(is_singular('post')){
    wp_enqueue_script('blog-single');
  }
  if(is_singular('clients')){
    wp_enqueue_script('portfolio-single');
  }
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('index');
}

function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}

function filter(){
  $template = get_template_part( 'partials/filter', 'filter');
  echo $template;
  die();
}

// function filter_description(){
//   $term_id = $_REQUEST['term_id'];
//   echo get_term($term_id)->description;
//   die();
// }

// function return_term_description(){
//   $term_id = $_REQUEST['term_id'];
//   $description = term_description($term_id, 'services');
//   echo $description;
//   die();
// }

//wrapping videos in responsive container

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
function wrap_embed_with_div($html, $url, $attr) {
        return "<div class=\"responsive-container\">".$html."</div>";
}


function filter_blog(){
  $template = get_template_part( 'partials/filter_blog', 'filter_blog');
  echo $template;
  die();
}

add_action('init', 'register_custom_clients_and_taxonomies');
add_action('get_header', 'remove_admin_login_header');
add_action( 'wp_enqueue_scripts', 'asset_pipeline' );
add_action( 'wp_ajax_filter', 'filter');
add_action( 'wp_ajax_nopriv_filter', 'filter');
add_action( 'wp_ajax_filter_description', 'filter_description');
add_action( 'wp_ajax_nopriv_filter_description', 'filter_description');
add_action( 'wp_ajax_return_term_description', 'return_term_description');
add_action( 'wp_ajax_nopriv_return_term_description', 'return_term_description');
add_action( 'wp_ajax_filter_blog', 'filter_blog');
add_action( 'wp_ajax_nopriv_filter_blog', 'filter_blog');

?>