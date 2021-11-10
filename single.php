<?php get_header(); ?>


<div class="container">
  <main class="row">
    <?php
      if(have_posts()){
        while(have_posts()){
          the_post();?>
          <section class="col-md-12">
            <h2><?php the_title(); ?></h2>
            <?php the_post_thumbnail('large'); ?>

            <p><?php echo 'Post Written by: ' . get_the_author() . ' | Published on: ' . get_the_date(); ?></p>

           <?php the_content(); ?>

          </section>
        <?php } //end while ?>
        <div class="navigation"><p><?php posts_nav_link(); ?></p></div> <?php
      } //end if ?>
  </main> <!-- row -->

  <?php
    //Navigates to the previous/next post
    proPhotographyPostNavigation();
  ?>

</div><!-- container -->

<?php get_footer(); ?>
