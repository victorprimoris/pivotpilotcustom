<?php get_header(); ?>

<?php

parse_str($_SERVER['QUERY_STRING'], $query);
$category = $query['category'];
$pagenum = $query['pagenum'] ? $query['pagenum'] : 1;
$offset = ($pagenum - 1) * 4;
$searchterm = $_POST['searchterm'] ? $_POST['searchterm'] : '';
$searchterm = $query['searchterm'] ? $query['searchterm'] : $searchterm;

$args = array(
  'posts_per_page'   => '',
  'offset'           => '',
  'category'         => $category,
  'orderby'          => 'date',
  'order'            => 'DESC',
  'include'          => '',
  'exclude'          => '',
  'meta_key'         => '',
  'meta_value'       => '',
  'post_type'        => 'post',
  'post_mime_type'   => '',
  'post_parent'      => '',
  'author'           => '',
  'author_name'      => '',
  'post_status'      => 'publish',
  'suppress_filters' => true,
  's'                => $searchterm,
);

$posts_array = get_posts($args);
$displayed_posts = array_slice($posts_array, $offset, 4);
$total_posts = ceil(count($posts_array) / 4.0) ;

$next_query_str = '';
$prev_query_str = '';

if($pagenum < $total_posts && $pagenum > 0){
  $page_num_str = '?pagenum=' . ($pagenum + 1);
  $category_query_str = $category ? '&category=' . $category : '';
  $searchterm_str = $searchterm ? '&searchterm=' . $searchterm : '';
  $next_query_str = $page_num_str . $category_query_str . $searchterm_str;

}

if($pagenum <= $total_posts && $pagenum > 1){
  $page_num_str = '?pagenum=' . ($pagenum - 1);
  $category_query_str = $category ? '&category=' . $category : '';
  $searchterm_str = $searchterm ? '&searchterm=' . $searchterm : '';
  $prev_query_str = $page_num_str . $category_query_str . $searchterm_str;
}

function generate_dropdown_str($num){
  $page_num_str = '?pagenum=' . $num;
  $category_query_str = $category ? '&category=' . $category : '';
  $searchterm_str = $searchterm ? '&searchterm=' . $searchterm : '';
  return $page_num_str . $category_query_str . $searchterm_str;
}

function generate_rotation(){
  return rand(-45, 45) . "deg";
}

function generate_side(){
  static $left = true;
  if($left){
    $left = false;
    return "0%";
  } else {
    $left = true;
    return "100%";
  }
}


function generate_top(){
  return rand(0, 50) . "%";
}

?>
<section id="blog-page" class="light-purple-background first-section last-section less-padding-top">

  <div class="search-bar">
    <div>
      <span id="current-taxonomy">All Posts</span>
      <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/dist/icons/arrow-down.svg' ?>"/>
    </div>
    <ul>
      <li class="<?php if(!$category){echo 'state-active';} ?>"><a class="filter-blog" data-term-id="0" href="?category=0">All Posts</a></li>
      <?php $terms = get_terms( 'category' );?>
      <?php foreach($terms as $term): ?>
      <li class="<?php if($category == $term->term_id){echo 'state-active';} ?>">
        <a class="filter-blog" data-term-id="<?php echo $term->term_id ?>" href="?category=<?php echo $term->term_id ?>"><?php echo $term->name ?></a>
      </li>
      <?php endforeach?>
    </ul>
  </div>

  <div id="search-by-title">
    <form action="" method="post">
      <input type="text" value="" name="searchterm" placeholder="Search by Title">
      <input type="submit" value="" name="search">
      <div></div>
    </form>
  </div>

  <div id="dynamic-content">
    <div id="blog-post-container">
      <?php foreach($displayed_posts as $post): ?>
        <?php $terms = get_the_terms($post, 'category'); ?>
        <div class="post blog-post">
          <div>
          <?php foreach($terms as $term): ?>
            <li class="term"><?php echo $term->name ?></li>
          <?php endforeach?>
          </div>
          <h3><?php echo $post->post_title ?></h3>
          <p class="date"><?php echo get_the_date('', $post) ?></p>
          <a class="image-cont" href="<?php echo get_permalink($post); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($post); ?>)">
            <?php foreach($terms as $term): ?>
              <img
                class="img-responsive desktop-image icon"
                src="<?php echo get_field('category_icon', 'category_' . $term->term_id); ?>"
                style="
                  transform: rotateZ(<?php echo generate_rotation(); ?>);
                  left: <?php echo generate_side(); ?>;
                  top: <?php echo generate_top(); ?>";
              />




            <?php endforeach?>
            <img class="img-responsive desktop-image state-active" src="<?php echo get_the_post_thumbnail_url($post); ?>" />
            <img alt="Click for more!" class="img-responsive" src="<?php echo get_template_directory_uri() . '/dist/icons/plus.svg' ?>"/>
          </a>
        </div>
      <?php endforeach ?>
    </div>

    <?php if(count($displayed_posts) > 0): ?>

    <div class="pagination">
      <a
        class="previous"
        href="<?php echo $prev_query_str ?>"
        data-category="<?php echo $category ?>"
        data-search-term="<?php echo $searchterm ?>"
      >
        <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/dist/icons/arrow-left.svg' ?>"/>
      </a>
      <div class="pagenums">
        <div>
          <span id="curpage"><?php echo $pagenum ?></span>
          <span> / </span>
          <span id="maxpage"><?php echo $total_posts ?></span>
        </div>
        <ul class="pagenums-dropdown">
          <?php foreach(range(1, $total_posts) as $number): ?>
          <a
            class="dropdown <?php if($number == $pagenum){ echo 'active';} ?>"
            href="<?php echo generate_dropdown_str($number); ?>"
            data-category="<?php echo $category ?>"
            data-pagenum="<?php echo $number ?>"
            data-search-term="<?php echo $searchterm ?>"><?php echo $number; ?></a>
          <?php endforeach ?>
        </ul>
      </div>
      <a
        class="next"
        href="<?php echo $next_query_str ?>"
        data-category="<?php echo $category ?>"
        data-search-term="<?php echo $searchterm ?>"
      >
        <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/dist/icons/arrow-right.svg' ?>"/>
      </a>
    </div>

    <?php else: ?>
      <h1 class="bold">No results found.</h1>
    <?php endif ?>

  </div>

</section>

<?php get_footer(); ?>