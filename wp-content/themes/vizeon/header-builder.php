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
  $header_slug = apply_filters('vizeon_get_header_layout', null );
  $header_id = '';
  $header = get_page_by_path($header_slug, OBJECT, 'gva_header');
  if($header) {
    $header_id = $header->ID;
  }
  $header_position = get_post_meta($header_id, 'vizeon_header_position', true);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <script>
    //Function checks if a given script is already loaded
    function isScriptLoaded(src){
        return document.querySelector('script[src="' + src + '"]') ? true : false;
    }
    
    //When a reply link is clicked, check if reply-script is loaded. If not, load it and emulate the click
    $('.comment-reply-link').click(function(){ 
        if(!(isScriptLoaded("/wp-includes/js/comment-reply.min.js"))){
            var script = document.createElement('script');
            script.src = "/wp-includes/js/comment-reply.min.js"; 
        script.onload = emRepClick($(this).attr('data-commentid'));        
            document.head.appendChild(script);
        } 
    });
    //Function waits 50 ms before it emulates a click on the relevant reply link now that the reply script is loaded
    function emRepClick(comId) {
    sleep(50).then(() => {
    document.querySelectorAll('[data-commentid="'+comId+'"]')[0].dispatchEvent(new Event('click'));
    });
    }
    //Function does nothing, for a given amount of time
    function sleep (time) {
      return new Promise((resolve) => setTimeout(resolve, time));
    }
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <div class="wrapper-page"> <!--page-->
    <?php do_action( 'vizeon_before_header' );  ?>
    
    <header class="header-builder-frontend header-position-<?php echo esc_attr($header_position) ?>">
      <?php do_action( 'vizeon_header_mobile' ); ?>
      <div class="header-builder-inner">
        <div class="d-none d-xl-block d-lg-block">
          <?php if(!empty($header_slug) && class_exists('Gavias_Themer_Header')){
            echo '<div class="header-main-wrapper">' .  Gavias_Themer_Header::getInstance()->render_header_builder($header_slug)  . '</div>'; 
          }else{
            get_template_part('header-default');
          }?>
        </div> 
      </div>  
    </header>

    <?php do_action( 'vizeon_after_header' );  ?>
    
    <div id="page-content"> <!--page content-->