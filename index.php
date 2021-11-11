<?php get_header(); ?>

<div class="container">
  <div class="row">
    <?php 
      $i = 0;
      if(have_posts()){
          while (have_posts()){
            the_post();
              $i++; //This increments by one everytime the loop runs.
            ?>

            <?php if($i == 1){ ?>
              <div class="individual-post col-md-12 featured-post">
                <div class='row'>
                  <div class='col-md-3'>
                     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                  </div>

                  <div class="col-md-9">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                  </div>
                </div>
              
              </div>
              <?php
            }else{ ?>
                <div class="individual-post col-md-6">
                  <div class="text-container">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                  </div>
                </div>
            <?php } ?>


            <?php
          }
        }
      ?>
    </div>

</div>


<?php get_footer(); ?>
