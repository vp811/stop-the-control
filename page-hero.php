<?php
  /*
    Template Name: Hero Image
    Template Post Type: page
  */
get_header();

  if(have_posts()){
    while (have_posts()) {
      the_post(); ?>
      <div class="hero-container">
        <div class="hero-image">
          <?php the_post_thumbnail('full'); ?>
        </div>

        <div class="hero-title container">
          <?php the_title(); ?>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <main class="col-md-12">
            <section>
              <h3>The_content() Section</h3>
              <?php the_content(); ?>
            </section>

            <section>
              <h3>Widget Section</h3>
              <div class="row">
                <div class="col-md-4">
                  <?php dynamic_sidebar('home-left'); ?>
                </div>

                <div class="col-md-4">
                  <?php dynamic_sidebar('home-middle'); ?>
                </div>

                <div class="col-md-4">
                  <?php dynamic_sidebar('home-right'); ?>
                </div>
              </div>
            </section>
            </div>
          </div>

            <section class="call-to-action">
               <div class="col-md-12">
                  <?php dynamic_sidebar('call-to-action'); ?>
                </div>
            </section>

          <div class="container">
            <section>
              <h3>Advanced Custom Field Section</h3>
              <div class="row">
                <div class="col-md-4">
                  <?php
                    $image_URL = get_field('image-left');
                  ?>
                  <img src="<?php echo $image_URL; ?>" width="300" />

                  <h3><?php echo get_field('heading-left'); ?></h3>
                  <p><?php echo get_field('excerpt-left'); ?></p>

                </div>

                <div class="col-md-4">
                    <?php
                      $image_URL = get_field('image-middle');
                    ?>
                    <img src="<?php echo $image_URL; ?>" width="300" />

                    <h3><?php echo get_field('heading-middle'); ?></h3>
                    <p><?php echo get_field('excerpt-middle'); ?></p>
                </div>

                <div class="col-md-4">
                    <?php
                        $image_URL = get_field('image-right');
                      ?>
                      <img src="<?php echo $image_URL; ?>" width="300" />

                      <h3><?php echo get_field('heading-right'); ?></h3>
                      <p><?php echo get_field('excerpt-right'); ?></p>
                </div>
              </div>
            </section> 
    </div>
    </div>
            <section class="call-to-action acf">
              <h2 class="home-cta"><?php echo get_field('cta-heading'); ?></h2>
              <p><?php echo get_field('cta_text'); ?></p>
            </section>

            <div class="container">
            <section>
              <h3>Custom Query Section</h3>
              <div class="row">
                <?php 
                  $args = array(
                    'post_type' => 'post',
                    'category_name' => 'featured-news',
                    'posts_per_page' => 3
                  );
                  $query = new WP_Query( $args );

                  if($query->have_posts()){
                    while($query->have_posts()){
                      $query->the_post(); ?>
                      <div class="individual-post col-md-4">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        <div class="text-container">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                        </div>
                      </div>
                      <?php
                    }
                  }
                ?>
              </div>
            </section>
          </main>

        </div><!--row-->
      </div><!--container-->

  <?php   }//end while
        }//end of if
      ?>
<?php get_footer(); ?>
