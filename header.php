<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php bloginfo('name'); ?></title>

    <script src="https://kit.fontawesome.com/79e986c029.js" crossorigin="anonymous"></script>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 logo-container">

            <?php
            //Display logo if it's set, if not display site title.
            if(get_header_image() == ''){?>
              <h1><a href="<?php echo get_home_url(); ?>">
              <svg id="Group_50" data-name="Group 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="326.11" height="152.304" viewBox="0 0 326.11 152.304">
                <defs>
                  <clipPath id="clip-path">
                    <rect id="Rectangle_22" data-name="Rectangle 22" width="326.11" height="152.304" fill="none"/>
                  </clipPath>
                </defs>
                <g id="Group_45" data-name="Group 45" clip-path="url(#clip-path)">
                  <text id="STOP" transform="translate(0 57.959)" fill="#fff" font-size="72" font-family="Gentona-Bold, Gentona" font-weight="700"><tspan x="0" y="0" letter-spacing="-0.034em">S</tspan><tspan y="0" letter-spacing="-0.028em">T</tspan><tspan y="0" letter-spacing="-0.019em">O</tspan><tspan y="0">P</tspan></text>
                  <path id="Path_1" data-name="Path 1" d="M77.706,84.481c-1.512.112-2.352.112-3.64.112-2.632,0-3.36-1.176-3.36-3.584V71.6h6.608V64.265H70.706V58.273h-8.96v5.992H57.938V71.6h3.808v9.8c0,7.392,2.632,10.3,8.96,10.3a17.231,17.231,0,0,0,7.84-1.848Z" fill="none" stroke="#fff" stroke-width="1"/>
                  <path id="Path_2" data-name="Path 2" d="M90.81,55.193H81.85v36.12h8.96V75.8c1.512-1.9,3.248-3.136,5.32-3.136,2.576,0,3.136,1.232,3.136,4.536V91.313h8.96V74.121c0-7.28-2.744-10.36-8.512-10.36-3.36,0-6.048,1.456-8.9,4.648Z" fill="none" stroke="#fff" stroke-width="1"/>
                  <path id="Path_3" data-name="Path 3" d="M120.434,75.073c.5-3.472,2.184-5.1,5.152-5.1,2.912,0,4.7,1.568,4.928,5.1ZM135.5,82.409a18.389,18.389,0,0,1-9.576,2.464c-3.024,0-4.816-1.456-5.432-4.48h17.472a29.384,29.384,0,0,0,.224-3.64c-.056-8.568-4.984-12.991-12.6-12.991-8.456,0-13.72,4.815-13.72,14.223,0,9.185,5.376,13.832,13.664,13.832a19.649,19.649,0,0,0,12.488-4.368Z" fill="none" stroke="#fff" stroke-width="1"/>
                  <text id="CONTROL" transform="translate(19.318 135.384)" fill="#fff" font-size="72" font-family="Gentona-Bold, Gentona" font-weight="700"><tspan x="0" y="0" letter-spacing="-0.024em">C</tspan><tspan y="0" letter-spacing="-0.02em">O</tspan><tspan y="0" letter-spacing="-0.014em">NTR</tspan><tspan y="0" letter-spacing="-0.02em">O</tspan><tspan y="0">L</tspan></text>
                </g>
              </svg>  
              </a></h1>
            <?php }else{ ?>
              <a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?> " width="<?php echo get_custom_header()->width; ?>" alt="Logo" /></a>
            <?php } ?>

          </div>

          <div class="col-lg-6">
            
            <div id="nav">
              <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
                <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="navbar-brand" href="#">Menu</a>
                      <?php
                      wp_nav_menu( array(
                          'theme_location'    => 'main-menu',
                          'depth'             => 3,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse',
                          'container_id'      => 'bs-example-navbar-collapse-1',
                          'menu_class'        => 'nav navbar-nav',
                          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                          'walker'            => new WP_Bootstrap_Navwalker(),
                      ) );
                      ?>
                  </div>
              </nav>
            </div><!-- #nav -->
          </div> <!-- col-lg-12 -->
        </div><!-- row -->

      </div><!-- container -->

    </header>