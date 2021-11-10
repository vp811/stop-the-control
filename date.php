<?php get_header(); ?>

<div class="container">
  <div class="row">
    <main class="col-md-9">
      <section class="date-container">
        <h2 class="date-title"><?php
          if(is_day()){
            echo "Daily Archives: " . get_the_date();
          }elseif(is_month()){
            echo "Monthly Archives: " . get_the_date('F Y');
          }elseif(is_year()){
            echo "Yearly Archives: " . get_the_date('Y');
          }
        ?>
        </h2>

        <?php
          if(have_posts()){
            while(have_posts()){
              the_post();?>

              <article class="individual-post">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

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

  </div><!-- row -->
</div><!-- container -->

<?php get_footer(); ?>
