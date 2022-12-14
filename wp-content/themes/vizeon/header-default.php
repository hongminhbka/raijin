<?php
/**
 * $Desc
 *
 * @version    1.0
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$vizeon_options = vizeon_get_options();
$vizeon_logo = get_template_directory_uri().'/images/logo.png';
if(isset($vizeon_options['header_logo']['url']) && $vizeon_options['header_logo']['url']){
  $vizeon_logo = $vizeon_options['header_logo']['url'];
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <script>!function(e){"function"==typeof define&&define.amd?define(e):e()}(function(){var e,t=["scroll","wheel","touchstart","touchmove","touchenter","touchend","touchleave","mouseout","mouseleave","mouseup","mousedown","mousemove","mouseenter","mousewheel","mouseover"];if(function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t),window.removeEventListener("test",null,t)}catch(e){}return e}()){var n=EventTarget.prototype.addEventListener;e=n,EventTarget.prototype.addEventListener=function(n,o,r){var i,s="object"==typeof r&&null!==r,u=s?r.capture:r;(r=s?function(e){var t=Object.getOwnPropertyDescriptor(e,"passive");return t&&!0!==t.writable&&void 0===t.set?Object.assign({},e):e}(r):{}).passive=void 0!==(i=r.passive)?i:-1!==t.indexOf(n)&&!0,r.capture=void 0!==u&&u,e.call(this,n,o,r)},EventTarget.prototype.addEventListener._original=e}});</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <div class="wrapper-page"> <!--page-->
    <?php do_action( 'vizeon_before_header' );  ?>
    
    <header class="header-default">
      
      <?php do_action( 'vizeon_header_mobile' ); ?>

      <div class="d-none d-xl-block d-lg-block">
        <div class="header-bottom">
          <div class="container">
            <div class="header-bottom-inner">
              
              <div class="logo">
                <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php echo esc_url($vizeon_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                </a>
              </div>
              
              <div class="main-menu-inner">
                <div class="content-innter clearfix">
                  <div id="gva-mainmenu" class="main-menu">
                    <?php do_action('vizeon_main_menu'); ?>
                  </div>
                </div> 
              </div>

              <div class="gsc-search-box">
                <div class="content-inner">
                  <div class="main-search gva-search">
                    <a class="control-search">
                      <span class="icon icon-font"><i class="fa fa-search"></i></span>  
                    </a>
                    <div class="gva-search-content search-content">
                      <div class="search-content-inner">
                        <div class="content-inner"><?php get_search_form(); ?></div>  
                      </div>  
                    </div>
                  </div>
                </div>
             </div>

            </div>
          </div>  
        </div>
      </div> 

    </header>
    <?php do_action( 'vizeon_after_header' );  ?>
    
    <div id="page-content"> <!--page content-->