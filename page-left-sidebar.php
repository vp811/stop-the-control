<?php
  /*
    Template Name: Left Sidebar 
    Template Post Type: page
  */

get_header();

  if(have_posts()){
    while (have_posts()) {
      the_post(); ?>
      <div class="container">
        <div class="row">
          <aside class="col-md-3">
            <?php get_sidebar(); ?>
          </aside>

          <main class="col-md-9">
            <section>
              <h2 class="entry-title"><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </section>
          </main>
        </div><!--row-->
      </div><!--container-->

  <?php   }//end while
        }//end of if

?>
<?php get_footer(); ?>
