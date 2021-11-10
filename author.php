<?php get_header(); ?>

<div class="container">
  <div class="row">
    <main class="col-md-9">
      <section class="author-information">
        <h2><?php echo get_the_author_meta('nickname'); ?></h2>

        <div class="row">
          <p class="col-lg-2 col-md-3"><?php echo get_avatar(get_the_author_meta('ID')); ?></p>

          <ul class="col-md-9">
            <li><span class="bold">Email:</span> <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><?php echo get_the_author_meta('user_email'); ?></a></li>
            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank">Website</a></li>
            <li><span class="bold">Registered Since:</span> <?php echo get_the_author_meta('user_registered'); ?></li>
          </ul>
        </div>

        <div class="author-bio">
          <h3>Bio</h3>
          <p><?php echo get_the_author_meta('description'); ?></p>
        </div>
      </section>

      <hr />

      <section class="author-posts">
        <h3>Posts written by <?php echo get_the_author_meta('nickname'); ?></h3>
        <?php
          if(have_posts()){
            while(have_posts()){
              the_post();?>

              <article class="individual-post">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>


                <?php
                  //Display author and publish date links
                   post_data();
                ?>
                <div class="image-excerpt-container">
                  <?php the_post_thumbnail('medium'); ?>
                  <?php the_excerpt(); ?>
                </div>
              </article>
            <?php } //end while

            //Pagination
            proPhotographyPagination();

          }//end if

        ?>
      </section>
    </main>

    <div class="sidebar-container col-lg-3">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>
