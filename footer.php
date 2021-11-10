
      <?php
        $image = get_field('image-subfooter');

        if( !empty( $image ) ){ ?>
          <div class="sub-footer-image">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="400" />
          </div>
      <?php  } ?>



    <footer>
      <div class="container">
        <nav class="row">
          <div class="col-md-4">
            <?php dynamic_sidebar('left-footer'); ?>
          </div>

          <div class="col-md-4">
            <?php
              if(has_nav_menu('footer-middle')){
                wp_nav_menu(array(
                  'theme_location' => 'footer-middle',
                  'container_class' => 'footer-middle'
                ));
              }else{
                echo "<p>Please select a main menu through the dashboard</p>";
              }
            ?>
          </div>

          <div class="col-md-4">
            <?php
              if(has_nav_menu('footer-right')){
                wp_nav_menu(array(
                  'theme_location' => 'footer-right',
                  'container_class' => 'footer-right'
                ));
              }else{
                echo "<p>Please select a main menu through the dashboard</p>";
              }
            ?>


            <div class="social-media">
              <h3>Follow Us</h3>
              <div class="facebook-container">
                <?php
                  $facebook = get_option('facebook_url');

                  if(!empty($facebook)){ ?>
                    <a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                  <?php } ?>
              </div>

              <div class="instagram-container">
                <?php
                  $instragram = get_option('instagram_url');

                  if(!empty($instragram )){ ?>
                    <a href="<?php echo $instragram; ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                  <?php } ?>
              </div>
            </div>



          </div>
        </nav>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
