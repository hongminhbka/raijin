<?php

/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
get_header();

$page_id = vizeon_id();

$default_sidebar_config = vizeon_get_option('product_sidebar_config', '');
$default_left_sidebar = vizeon_get_option('product_left_sidebar', '');
$default_right_sidebar = vizeon_get_option('product_right_sidebar', '');

$sidebar_layout_config = get_post_meta($page_id, 'vizeon_sidebar_config', true);
$left_sidebar = get_post_meta($page_id, 'vizeon_left_sidebar', true);
$right_sidebar = get_post_meta($page_id, 'vizeon_right_sidebar', true);

if ($sidebar_layout_config == "") {
   $sidebar_layout_config = $default_sidebar_config;
}
if ($left_sidebar == "") {
   $left_sidebar = $default_left_sidebar;
}
if ($right_sidebar == "") {
   $right_sidebar = $default_right_sidebar;
}

$left_sidebar_config  = array('active' => false);
$right_sidebar_config = array('active' => false);
$main_content_config  = array('class' => 'col-lg-12 col-xs-12');

$sidebar_config = vizeon_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);

extract($sidebar_config);

?>

<section id="wp-main-content" class="clearfix main-page">
   <?php
   /**
    * woocommerce_before_main_content hook
    *
    * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
    * @hooked woocommerce_breadcrumb - 20
    */
   do_action('woocommerce_before_main_content');
   ?>

   <div class="container">
      <div class="main-page-content row">
         <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">

            <?php while (have_posts()) : the_post(); ?>

               <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. 
            ?>

         </div>

         <!-- Left sidebar -->
         <?php if ($left_sidebar_config['active']) : ?>
            <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
               <?php do_action('vizeon_before_sidebar'); ?>
               <div class="sidebar-inner">
                  <?php dynamic_sidebar($left_sidebar_config['name']); ?>
               </div>
               <?php do_action('vizeon_after_sidebar'); ?>
            </div>
         <?php endif ?>

         <!-- Right Sidebar -->
         <?php if ($right_sidebar_config['active']) : ?>
            <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
               <?php do_action('vizeon_before_sidebar'); ?>
               <div class="sidebar-inner">
                  <?php dynamic_sidebar($right_sidebar_config['name']); ?>
               </div>
               <?php do_action('vizeon_after_sidebar'); ?>
            </div>
         <?php endif ?>

      </div>
   </div>

   <?php
   /**
    * woocommerce_after_main_content hook
    *
    * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
    */
   do_action('woocommerce_after_main_content');
   ?>

   <div class="related-section">
      <div style="background-color: #2E3A5B; padding: 40px 0px ">
         <div class="container" style="padding: 40px;">
            <div style="font-family: 'Montserrat';
				font-style: normal;
				font-weight: 600;
				font-size: 32px;
				color: white;
				line-height: 40px;">
               Bạn đang tìm sản phẩm cho xe gì
            </div>
            <div style="
				font-family: 'Montserrat';
				font-style: normal;
				font-weight: 400;
				font-size: 16px;
				line-height: 24px;
				color: white;
				padding: 20px 0px
				">
               Raijin có đủ sản phẩm cho tất cả các dòng xe
            </div>
            <div class=" row" style="justify-content: space-between;">

               <div class="col-lg-3 col-md-6  col-sm-12 mt-2">
                  <button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color: '#2E3A5B'">
                     <span style="color: #2E3A5B">
                        Honda
                     </span>
                  </button>

               </div>
               <div class="col-lg-3 col-md-6  col-sm-12 mt-2">

                  <button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
                     <span style="color: #2E3A5B">
                        Yamaha
                     </span></button>
               </div>
               <div class="col-lg-3 col-md-6  col-sm-12 mt-2">
                  <button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
                     <span style="color: #2E3A5B">
                        Piagio
                     </span></button>
               </div>
               <div class="col-lg-3 col-md-6  col-sm-12 mt-2">

                  <button type="button" class="btn btn-lg" style="background-color: white; width: 100% ; height:auto; color:'#2E3A5B'">
                     <span style="color: #2E3A5B">
                        Xe hãng khác
                     </span>
                  </button>
               </div>
            </div>
         </div>


      </div>
    
   </div>
</section>

<?php get_footer(); ?>