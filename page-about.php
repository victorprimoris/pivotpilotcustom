<?php get_header(); ?>

<?php
function render_image($field_name){
  if(get_field($field_name)){
    echo "<div><img class='img-responsive' src='" . get_field($field_name) . "'/></div>";
  }
}
?>

<section class="first-section about-section last-section">
  <div id="about-slider" class="fade-slide-container">
    <?php render_image('slider_image_one'); ?>
    <?php render_image('slider_image_two'); ?>
    <?php render_image('slider_image_three'); ?>
  </div>
  <h1 class="about-excerpt white">We like to call ourselves visual communicators ... it sounds fancy</h1>
  <p class="white"><?php echo $post->post_content; ?></p>
  <div id="featured-team-members" class="slide-container">
    <?php $team_members = get_posts(array('post_type' => 'members','numberposts' => -1));?>
    <?php foreach($team_members as $team_member): ?>
    <div class="slide">
      <div class="slide-inner-cont">
        <img class="fun-fact" src="<?php echo get_template_directory_uri() . '/dist/img/fact.svg'; ?>"/>
        <img src="<?php the_field('team_member_icon', $team_member); ?>"/>
        <a class="slide-image-cont" style="background-image: url(<?php echo get_the_post_thumbnail_url($team_member) ?>)">
          <div class="overlay"></div>
          <h3><?php the_field('team_member_first_name', $team_member) ?><br> likes <?php the_field('team_member_icon_name', $team_member) ?></h3>
        </a>
        <h1><?php the_field('team_member_first_name', $team_member) ?> <?php the_field('team_member_last_name', $team_member) ?></h1>
        <p class="title"><?php the_field('team_member_title_one', $team_member) ?></p>
        <p class="title"><?php the_field('team_member_title_two', $team_member) ?></p>
      </div>
    </div>
    <?php endforeach ?>
  </div>
  <div id="featured-team-members-controller">
    <img src="<?php echo get_template_directory_uri() . '/dist/img/member.svg'; ?>"/>
  </div>
</section>

<?php get_footer(); ?>