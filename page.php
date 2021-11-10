<?php get_header(); ?>

<?php the_post_thumbnail(); ?>

<div class="container">
  <main class="row">
    <?php
      if(have_posts()){
        while(have_posts()){
          the_post();?>
          <section class="col-md-12">
            <h2><?php the_title(); ?></h2>

            <?php the_content(); ?>

          </section>
        <?php } //end while
      } //end if

    ?>
  </main> <!-- row -->
</div><!-- container -->

<?php get_footer(); ?>
