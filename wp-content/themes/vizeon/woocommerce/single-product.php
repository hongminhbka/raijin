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
      <div style="background-color: #F4F4F4 ; padding: 40px 0px">
         <div class="container" style="padding: 40px">
            <div style="
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 32px;
            color: #2e3a5b;
            line-height: 40px;
          ">
               Hệ sản phẩm được kiểm nghiệm và bảo chứng chất lượng
            </div>
            <div style="
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #2e3a5b;
            padding: 20px 0px;
          ">
               Consectetur adipisicing elit sed do eiusmod tempor incididunt ut
               labore et dolore magna aliqua. Ut enim ad minim Consectetur
               adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore
               magna aliqua. Ut enim ad minim incidi
            </div>
            <div class="row" style="justify-content: space-between">
               <div class="col-lg-4 col-md-12 col-sm-12 mt-2 text-center">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M58.0638 30.9694C58.0638 14.1489 41.5055 0.839575 40.8011 0.28074C40.3317 -0.090976 39.6683 -0.090976 39.1983 0.28074C38.4939 0.839575 21.9355 14.1489 21.9355 30.9694C21.9355 46.4026 35.8711 58.8708 38.7094 61.2549V74.8395C38.7094 75.5521 39.2871 76.1298 39.9997 76.1298C40.7123 76.1298 41.29 75.5521 41.29 74.8395V61.2549C44.1289 58.8708 58.0638 46.4026 58.0638 30.9694ZM41.29 57.7815V43.1793L48.5674 37.1229C49.1156 36.6667 49.1899 35.8528 48.7338 35.3046C48.2776 34.7565 47.4636 34.6822 46.9161 35.1383L41.29 39.8219V35.435L48.5674 29.378C49.1156 28.9224 49.1899 28.1084 48.7338 27.5603C48.2776 27.0122 47.4636 26.9379 46.9161 27.394L41.29 32.0801V26.403L48.5674 20.3459C49.1156 19.8904 49.1899 19.0764 48.7338 18.5282C48.2776 17.9801 47.4636 17.9058 46.9161 18.3619L41.29 23.0481V12.9052C41.29 12.1927 40.7123 11.6149 39.9997 11.6149C39.2871 11.6149 38.7094 12.1927 38.7094 12.9052V23.0481L33.0839 18.3644C32.5358 17.9083 31.7218 17.9826 31.2656 18.5308C30.8095 19.0789 30.8845 19.8929 31.4326 20.349L38.7094 26.4055V32.0827L33.0839 27.399C32.5358 26.9429 31.7218 27.0172 31.2656 27.5654C30.8095 28.1135 30.8845 28.9275 31.4326 29.3836L38.7094 35.4376V39.8244L33.0839 35.1408C32.5358 34.6847 31.7218 34.759 31.2656 35.3071C30.8095 35.8553 30.8845 36.6693 31.4326 37.1254L38.7094 43.1793V57.7815C34.3225 53.6655 24.5161 43.1163 24.5161 30.9694C24.5161 17.4288 36.721 5.8483 39.9997 2.98293C43.2784 5.8483 55.4832 17.4288 55.4832 30.9694C55.4832 43.1163 45.6769 53.6655 41.29 57.7815Z" fill="#2E3A5B" />
                     <path d="M30.9679 68.3879H29.6776V58.9129C29.682 57.2012 29.0016 55.5587 27.7876 54.3522L16.9259 43.4848C15.4157 41.981 12.9731 41.981 11.4629 43.4848L10.3232 44.6283V30.9693C10.3219 29.5354 9.72466 28.167 8.6744 27.1911C7.62477 26.2145 6.21666 25.7187 4.7865 25.8208C2.03643 26.0885 -0.0470733 28.424 0.000808853 31.1873V49.6188C0.000178825 51.2241 0.598075 52.7714 1.67857 53.9584L12.9038 66.3063V68.3879H11.6135C10.9009 68.3879 10.3232 68.9657 10.3232 69.6782V78.7103C10.3232 79.4229 10.9009 80.0006 11.6135 80.0006H30.9679C31.6805 80.0006 32.2582 79.4229 32.2582 78.7103V69.6782C32.2582 68.9657 31.6805 68.3879 30.9679 68.3879ZM3.58819 52.2214C2.93989 51.5101 2.58077 50.5815 2.5814 49.6188V31.1873C2.54675 29.7824 3.57748 28.5771 4.9711 28.395C5.71957 28.3415 6.45481 28.6156 6.9853 29.146C7.47168 29.628 7.74448 30.2845 7.74259 30.9693V46.6734C7.73944 47.701 8.1477 48.687 8.87664 49.4115L15.8624 56.3972C16.3689 56.8861 17.1735 56.8792 17.6712 56.3815C18.1689 55.8838 18.1758 55.0786 17.6869 54.5727L11.7647 48.6498C11.5234 48.4098 11.3879 48.0834 11.3879 47.7432C11.3879 47.4023 11.5234 47.076 11.7647 46.836L13.2875 45.3144C13.7896 44.818 14.5986 44.818 15.1013 45.3144L25.963 56.1774C26.6869 56.9044 27.0945 57.8873 27.097 58.9129V68.3879H15.4844V65.3077L3.58819 52.2214ZM29.6776 77.42H12.9038V70.9685H29.6776V77.42Z" fill="#2E3A5B" />
                     <path d="M75.2129 25.8208C73.7834 25.7187 72.3747 26.2145 71.325 27.1911C70.2754 28.167 69.6781 29.5354 69.6762 30.9693V44.6283L68.5372 43.4886C67.027 41.9847 64.5844 41.9847 63.0742 43.4886L52.2125 54.3522C50.9985 55.5587 50.318 57.2012 50.3218 58.9129V68.3879H49.0315C48.3189 68.3879 47.7412 68.9657 47.7412 69.6782V78.7103C47.7412 79.4229 48.3189 80.0006 49.0315 80.0006H68.3859C69.0985 80.0006 69.6762 79.4229 69.6762 78.7103V69.6782C69.6762 68.9657 69.0985 68.3879 68.3859 68.3879H67.0957V66.3063L78.3215 53.9584C79.402 52.7714 79.9999 51.2241 79.9986 49.6188V31.1873C80.0465 28.424 77.9636 26.0885 75.2129 25.8208ZM67.0957 77.42H50.3218V70.9685H67.0957V77.42ZM77.418 49.6188C77.4193 50.5815 77.0602 51.5101 76.4119 52.2214L64.5151 65.3077V68.3879H52.9024V58.9129C52.9049 57.8873 53.3125 56.9032 54.0364 56.1761L64.9025 45.3144C65.4047 44.818 66.2136 44.818 66.7164 45.3144L68.2392 46.8372C68.7362 47.3368 68.7362 48.1439 68.2392 48.6435L62.3137 54.5689C61.9786 54.8927 61.8437 55.3722 61.9622 55.8233C62.08 56.2744 62.4328 56.6272 62.8839 56.745C63.335 56.8628 63.8145 56.7286 64.1383 56.3928L71.124 49.4077C71.8511 48.6832 72.2587 47.6991 72.2568 46.6734V30.9693C72.2556 30.2845 72.5284 29.628 73.0141 29.146C73.5452 28.6156 74.2799 28.3421 75.0283 28.395C76.4219 28.5771 77.4533 29.7824 77.418 31.1873V49.6188Z" fill="#2E3A5B" />
                     <path d="M39.0842 77.7942C38.8479 78.0412 38.7144 78.3682 38.71 78.7103C38.7125 78.7966 38.7207 78.8829 38.7358 78.968C38.7503 79.0492 38.7761 79.1274 38.8133 79.2004C38.8416 79.2824 38.8807 79.3605 38.9292 79.4329C38.9771 79.5003 39.0288 79.5646 39.0842 79.6264C39.5933 80.1253 40.4079 80.1253 40.9164 79.6264L41.0714 79.4329C41.1199 79.3605 41.1589 79.2824 41.1873 79.2004C41.2251 79.1274 41.2509 79.0492 41.2635 78.968C41.2799 78.8829 41.2887 78.7966 41.2906 78.7103C41.2938 78.1861 40.9794 77.7117 40.4955 77.5107C40.011 77.3097 39.4534 77.4218 39.0842 77.7942Z" fill="#2E3A5B" />
                     <path d="M15.4847 74.8394H20.646C21.3585 74.8394 21.9363 74.2617 21.9363 73.5491C21.9363 72.8365 21.3585 72.2588 20.646 72.2588H15.4847C14.7721 72.2588 14.1943 72.8365 14.1943 73.5491C14.1943 74.2617 14.7721 74.8394 15.4847 74.8394Z" fill="#2E3A5B" />
                     <path d="M24.0261 74.736C24.181 74.8022 24.348 74.8369 24.5162 74.8394C25.0404 74.8419 25.5148 74.5275 25.7158 74.0436C25.9168 73.5598 25.8047 73.0016 25.4323 72.633C25.0612 72.2663 24.5068 72.1598 24.0261 72.3614C23.8679 72.4238 23.7236 72.5158 23.6002 72.633C23.3639 72.88 23.2303 73.2069 23.2259 73.5491C23.2139 74.0739 23.5346 74.5502 24.0261 74.736Z" fill="#2E3A5B" />
                     <path d="M52.8759 33.2916C52.8633 33.2109 52.8374 33.1322 52.7996 33.0591C52.7713 32.9772 52.7322 32.8991 52.6837 32.8272L52.5287 32.6338C52.0114 32.1562 51.2138 32.1562 50.6965 32.6338C50.6411 32.6949 50.5894 32.7592 50.5415 32.8272C50.493 32.8991 50.4539 32.9772 50.4256 33.0591C50.3884 33.1322 50.3626 33.2109 50.3481 33.2916C50.3336 33.3773 50.3254 33.4629 50.3223 33.5499C50.3267 33.8914 50.4602 34.219 50.6965 34.466C50.9422 34.7041 51.2705 34.8377 51.6126 34.8402C51.956 34.8434 52.2861 34.7085 52.5293 34.466C52.7719 34.2234 52.9067 33.8926 52.9029 33.5499C52.9004 33.4629 52.8916 33.3766 52.8759 33.2916Z" fill="#2E3A5B" />
                  </svg>

                  <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 20px;
                line-height: 28px;
                color: #2e3a5b;
                padding: 20px 0px;
              ">
                     Cục đăng kiểm việt nam
                  </div>
               </div>
               <div class="col-lg-4 col-md-12 col-sm-12 mt-2 text-center">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M58.0638 30.9694C58.0638 14.1489 41.5055 0.839575 40.8011 0.28074C40.3317 -0.090976 39.6683 -0.090976 39.1983 0.28074C38.4939 0.839575 21.9355 14.1489 21.9355 30.9694C21.9355 46.4026 35.8711 58.8708 38.7094 61.2549V74.8395C38.7094 75.5521 39.2871 76.1298 39.9997 76.1298C40.7123 76.1298 41.29 75.5521 41.29 74.8395V61.2549C44.1289 58.8708 58.0638 46.4026 58.0638 30.9694ZM41.29 57.7815V43.1793L48.5674 37.1229C49.1156 36.6667 49.1899 35.8528 48.7338 35.3046C48.2776 34.7565 47.4636 34.6822 46.9161 35.1383L41.29 39.8219V35.435L48.5674 29.378C49.1156 28.9224 49.1899 28.1084 48.7338 27.5603C48.2776 27.0122 47.4636 26.9379 46.9161 27.394L41.29 32.0801V26.403L48.5674 20.3459C49.1156 19.8904 49.1899 19.0764 48.7338 18.5282C48.2776 17.9801 47.4636 17.9058 46.9161 18.3619L41.29 23.0481V12.9052C41.29 12.1927 40.7123 11.6149 39.9997 11.6149C39.2871 11.6149 38.7094 12.1927 38.7094 12.9052V23.0481L33.0839 18.3644C32.5358 17.9083 31.7218 17.9826 31.2656 18.5308C30.8095 19.0789 30.8845 19.8929 31.4326 20.349L38.7094 26.4055V32.0827L33.0839 27.399C32.5358 26.9429 31.7218 27.0172 31.2656 27.5654C30.8095 28.1135 30.8845 28.9275 31.4326 29.3836L38.7094 35.4376V39.8244L33.0839 35.1408C32.5358 34.6847 31.7218 34.759 31.2656 35.3071C30.8095 35.8553 30.8845 36.6693 31.4326 37.1254L38.7094 43.1793V57.7815C34.3225 53.6655 24.5161 43.1163 24.5161 30.9694C24.5161 17.4288 36.721 5.8483 39.9997 2.98293C43.2784 5.8483 55.4832 17.4288 55.4832 30.9694C55.4832 43.1163 45.6769 53.6655 41.29 57.7815Z" fill="#2E3A5B" />
                     <path d="M30.9679 68.3879H29.6776V58.9129C29.682 57.2012 29.0016 55.5587 27.7876 54.3522L16.9259 43.4848C15.4157 41.981 12.9731 41.981 11.4629 43.4848L10.3232 44.6283V30.9693C10.3219 29.5354 9.72466 28.167 8.6744 27.1911C7.62477 26.2145 6.21666 25.7187 4.7865 25.8208C2.03643 26.0885 -0.0470733 28.424 0.000808853 31.1873V49.6188C0.000178825 51.2241 0.598075 52.7714 1.67857 53.9584L12.9038 66.3063V68.3879H11.6135C10.9009 68.3879 10.3232 68.9657 10.3232 69.6782V78.7103C10.3232 79.4229 10.9009 80.0006 11.6135 80.0006H30.9679C31.6805 80.0006 32.2582 79.4229 32.2582 78.7103V69.6782C32.2582 68.9657 31.6805 68.3879 30.9679 68.3879ZM3.58819 52.2214C2.93989 51.5101 2.58077 50.5815 2.5814 49.6188V31.1873C2.54675 29.7824 3.57748 28.5771 4.9711 28.395C5.71957 28.3415 6.45481 28.6156 6.9853 29.146C7.47168 29.628 7.74448 30.2845 7.74259 30.9693V46.6734C7.73944 47.701 8.1477 48.687 8.87664 49.4115L15.8624 56.3972C16.3689 56.8861 17.1735 56.8792 17.6712 56.3815C18.1689 55.8838 18.1758 55.0786 17.6869 54.5727L11.7647 48.6498C11.5234 48.4098 11.3879 48.0834 11.3879 47.7432C11.3879 47.4023 11.5234 47.076 11.7647 46.836L13.2875 45.3144C13.7896 44.818 14.5986 44.818 15.1013 45.3144L25.963 56.1774C26.6869 56.9044 27.0945 57.8873 27.097 58.9129V68.3879H15.4844V65.3077L3.58819 52.2214ZM29.6776 77.42H12.9038V70.9685H29.6776V77.42Z" fill="#2E3A5B" />
                     <path d="M75.2129 25.8208C73.7834 25.7187 72.3747 26.2145 71.325 27.1911C70.2754 28.167 69.6781 29.5354 69.6762 30.9693V44.6283L68.5372 43.4886C67.027 41.9847 64.5844 41.9847 63.0742 43.4886L52.2125 54.3522C50.9985 55.5587 50.318 57.2012 50.3218 58.9129V68.3879H49.0315C48.3189 68.3879 47.7412 68.9657 47.7412 69.6782V78.7103C47.7412 79.4229 48.3189 80.0006 49.0315 80.0006H68.3859C69.0985 80.0006 69.6762 79.4229 69.6762 78.7103V69.6782C69.6762 68.9657 69.0985 68.3879 68.3859 68.3879H67.0957V66.3063L78.3215 53.9584C79.402 52.7714 79.9999 51.2241 79.9986 49.6188V31.1873C80.0465 28.424 77.9636 26.0885 75.2129 25.8208ZM67.0957 77.42H50.3218V70.9685H67.0957V77.42ZM77.418 49.6188C77.4193 50.5815 77.0602 51.5101 76.4119 52.2214L64.5151 65.3077V68.3879H52.9024V58.9129C52.9049 57.8873 53.3125 56.9032 54.0364 56.1761L64.9025 45.3144C65.4047 44.818 66.2136 44.818 66.7164 45.3144L68.2392 46.8372C68.7362 47.3368 68.7362 48.1439 68.2392 48.6435L62.3137 54.5689C61.9786 54.8927 61.8437 55.3722 61.9622 55.8233C62.08 56.2744 62.4328 56.6272 62.8839 56.745C63.335 56.8628 63.8145 56.7286 64.1383 56.3928L71.124 49.4077C71.8511 48.6832 72.2587 47.6991 72.2568 46.6734V30.9693C72.2556 30.2845 72.5284 29.628 73.0141 29.146C73.5452 28.6156 74.2799 28.3421 75.0283 28.395C76.4219 28.5771 77.4533 29.7824 77.418 31.1873V49.6188Z" fill="#2E3A5B" />
                     <path d="M39.0842 77.7942C38.8479 78.0412 38.7144 78.3682 38.71 78.7103C38.7125 78.7966 38.7207 78.8829 38.7358 78.968C38.7503 79.0492 38.7761 79.1274 38.8133 79.2004C38.8416 79.2824 38.8807 79.3605 38.9292 79.4329C38.9771 79.5003 39.0288 79.5646 39.0842 79.6264C39.5933 80.1253 40.4079 80.1253 40.9164 79.6264L41.0714 79.4329C41.1199 79.3605 41.1589 79.2824 41.1873 79.2004C41.2251 79.1274 41.2509 79.0492 41.2635 78.968C41.2799 78.8829 41.2887 78.7966 41.2906 78.7103C41.2938 78.1861 40.9794 77.7117 40.4955 77.5107C40.011 77.3097 39.4534 77.4218 39.0842 77.7942Z" fill="#2E3A5B" />
                     <path d="M15.4847 74.8394H20.646C21.3585 74.8394 21.9363 74.2617 21.9363 73.5491C21.9363 72.8365 21.3585 72.2588 20.646 72.2588H15.4847C14.7721 72.2588 14.1943 72.8365 14.1943 73.5491C14.1943 74.2617 14.7721 74.8394 15.4847 74.8394Z" fill="#2E3A5B" />
                     <path d="M24.0261 74.736C24.181 74.8022 24.348 74.8369 24.5162 74.8394C25.0404 74.8419 25.5148 74.5275 25.7158 74.0436C25.9168 73.5598 25.8047 73.0016 25.4323 72.633C25.0612 72.2663 24.5068 72.1598 24.0261 72.3614C23.8679 72.4238 23.7236 72.5158 23.6002 72.633C23.3639 72.88 23.2303 73.2069 23.2259 73.5491C23.2139 74.0739 23.5346 74.5502 24.0261 74.736Z" fill="#2E3A5B" />
                     <path d="M52.8759 33.2916C52.8633 33.2109 52.8374 33.1322 52.7996 33.0591C52.7713 32.9772 52.7322 32.8991 52.6837 32.8272L52.5287 32.6338C52.0114 32.1562 51.2138 32.1562 50.6965 32.6338C50.6411 32.6949 50.5894 32.7592 50.5415 32.8272C50.493 32.8991 50.4539 32.9772 50.4256 33.0591C50.3884 33.1322 50.3626 33.2109 50.3481 33.2916C50.3336 33.3773 50.3254 33.4629 50.3223 33.5499C50.3267 33.8914 50.4602 34.219 50.6965 34.466C50.9422 34.7041 51.2705 34.8377 51.6126 34.8402C51.956 34.8434 52.2861 34.7085 52.5293 34.466C52.7719 34.2234 52.9067 33.8926 52.9029 33.5499C52.9004 33.4629 52.8916 33.3766 52.8759 33.2916Z" fill="#2E3A5B" />
                  </svg>

                  <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 20px;
                line-height: 28px;
                color: #2e3a5b;
                padding: 20px 0px;
              ">
                     Hiệp hội
                  </div>
               </div>
               <div class="col-lg-4 col-md-12 col-sm-12 mt-2 text-center">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M58.0638 30.9694C58.0638 14.1489 41.5055 0.839575 40.8011 0.28074C40.3317 -0.090976 39.6683 -0.090976 39.1983 0.28074C38.4939 0.839575 21.9355 14.1489 21.9355 30.9694C21.9355 46.4026 35.8711 58.8708 38.7094 61.2549V74.8395C38.7094 75.5521 39.2871 76.1298 39.9997 76.1298C40.7123 76.1298 41.29 75.5521 41.29 74.8395V61.2549C44.1289 58.8708 58.0638 46.4026 58.0638 30.9694ZM41.29 57.7815V43.1793L48.5674 37.1229C49.1156 36.6667 49.1899 35.8528 48.7338 35.3046C48.2776 34.7565 47.4636 34.6822 46.9161 35.1383L41.29 39.8219V35.435L48.5674 29.378C49.1156 28.9224 49.1899 28.1084 48.7338 27.5603C48.2776 27.0122 47.4636 26.9379 46.9161 27.394L41.29 32.0801V26.403L48.5674 20.3459C49.1156 19.8904 49.1899 19.0764 48.7338 18.5282C48.2776 17.9801 47.4636 17.9058 46.9161 18.3619L41.29 23.0481V12.9052C41.29 12.1927 40.7123 11.6149 39.9997 11.6149C39.2871 11.6149 38.7094 12.1927 38.7094 12.9052V23.0481L33.0839 18.3644C32.5358 17.9083 31.7218 17.9826 31.2656 18.5308C30.8095 19.0789 30.8845 19.8929 31.4326 20.349L38.7094 26.4055V32.0827L33.0839 27.399C32.5358 26.9429 31.7218 27.0172 31.2656 27.5654C30.8095 28.1135 30.8845 28.9275 31.4326 29.3836L38.7094 35.4376V39.8244L33.0839 35.1408C32.5358 34.6847 31.7218 34.759 31.2656 35.3071C30.8095 35.8553 30.8845 36.6693 31.4326 37.1254L38.7094 43.1793V57.7815C34.3225 53.6655 24.5161 43.1163 24.5161 30.9694C24.5161 17.4288 36.721 5.8483 39.9997 2.98293C43.2784 5.8483 55.4832 17.4288 55.4832 30.9694C55.4832 43.1163 45.6769 53.6655 41.29 57.7815Z" fill="#2E3A5B" />
                     <path d="M30.9679 68.3879H29.6776V58.9129C29.682 57.2012 29.0016 55.5587 27.7876 54.3522L16.9259 43.4848C15.4157 41.981 12.9731 41.981 11.4629 43.4848L10.3232 44.6283V30.9693C10.3219 29.5354 9.72466 28.167 8.6744 27.1911C7.62477 26.2145 6.21666 25.7187 4.7865 25.8208C2.03643 26.0885 -0.0470733 28.424 0.000808853 31.1873V49.6188C0.000178825 51.2241 0.598075 52.7714 1.67857 53.9584L12.9038 66.3063V68.3879H11.6135C10.9009 68.3879 10.3232 68.9657 10.3232 69.6782V78.7103C10.3232 79.4229 10.9009 80.0006 11.6135 80.0006H30.9679C31.6805 80.0006 32.2582 79.4229 32.2582 78.7103V69.6782C32.2582 68.9657 31.6805 68.3879 30.9679 68.3879ZM3.58819 52.2214C2.93989 51.5101 2.58077 50.5815 2.5814 49.6188V31.1873C2.54675 29.7824 3.57748 28.5771 4.9711 28.395C5.71957 28.3415 6.45481 28.6156 6.9853 29.146C7.47168 29.628 7.74448 30.2845 7.74259 30.9693V46.6734C7.73944 47.701 8.1477 48.687 8.87664 49.4115L15.8624 56.3972C16.3689 56.8861 17.1735 56.8792 17.6712 56.3815C18.1689 55.8838 18.1758 55.0786 17.6869 54.5727L11.7647 48.6498C11.5234 48.4098 11.3879 48.0834 11.3879 47.7432C11.3879 47.4023 11.5234 47.076 11.7647 46.836L13.2875 45.3144C13.7896 44.818 14.5986 44.818 15.1013 45.3144L25.963 56.1774C26.6869 56.9044 27.0945 57.8873 27.097 58.9129V68.3879H15.4844V65.3077L3.58819 52.2214ZM29.6776 77.42H12.9038V70.9685H29.6776V77.42Z" fill="#2E3A5B" />
                     <path d="M75.2129 25.8208C73.7834 25.7187 72.3747 26.2145 71.325 27.1911C70.2754 28.167 69.6781 29.5354 69.6762 30.9693V44.6283L68.5372 43.4886C67.027 41.9847 64.5844 41.9847 63.0742 43.4886L52.2125 54.3522C50.9985 55.5587 50.318 57.2012 50.3218 58.9129V68.3879H49.0315C48.3189 68.3879 47.7412 68.9657 47.7412 69.6782V78.7103C47.7412 79.4229 48.3189 80.0006 49.0315 80.0006H68.3859C69.0985 80.0006 69.6762 79.4229 69.6762 78.7103V69.6782C69.6762 68.9657 69.0985 68.3879 68.3859 68.3879H67.0957V66.3063L78.3215 53.9584C79.402 52.7714 79.9999 51.2241 79.9986 49.6188V31.1873C80.0465 28.424 77.9636 26.0885 75.2129 25.8208ZM67.0957 77.42H50.3218V70.9685H67.0957V77.42ZM77.418 49.6188C77.4193 50.5815 77.0602 51.5101 76.4119 52.2214L64.5151 65.3077V68.3879H52.9024V58.9129C52.9049 57.8873 53.3125 56.9032 54.0364 56.1761L64.9025 45.3144C65.4047 44.818 66.2136 44.818 66.7164 45.3144L68.2392 46.8372C68.7362 47.3368 68.7362 48.1439 68.2392 48.6435L62.3137 54.5689C61.9786 54.8927 61.8437 55.3722 61.9622 55.8233C62.08 56.2744 62.4328 56.6272 62.8839 56.745C63.335 56.8628 63.8145 56.7286 64.1383 56.3928L71.124 49.4077C71.8511 48.6832 72.2587 47.6991 72.2568 46.6734V30.9693C72.2556 30.2845 72.5284 29.628 73.0141 29.146C73.5452 28.6156 74.2799 28.3421 75.0283 28.395C76.4219 28.5771 77.4533 29.7824 77.418 31.1873V49.6188Z" fill="#2E3A5B" />
                     <path d="M39.0842 77.7942C38.8479 78.0412 38.7144 78.3682 38.71 78.7103C38.7125 78.7966 38.7207 78.8829 38.7358 78.968C38.7503 79.0492 38.7761 79.1274 38.8133 79.2004C38.8416 79.2824 38.8807 79.3605 38.9292 79.4329C38.9771 79.5003 39.0288 79.5646 39.0842 79.6264C39.5933 80.1253 40.4079 80.1253 40.9164 79.6264L41.0714 79.4329C41.1199 79.3605 41.1589 79.2824 41.1873 79.2004C41.2251 79.1274 41.2509 79.0492 41.2635 78.968C41.2799 78.8829 41.2887 78.7966 41.2906 78.7103C41.2938 78.1861 40.9794 77.7117 40.4955 77.5107C40.011 77.3097 39.4534 77.4218 39.0842 77.7942Z" fill="#2E3A5B" />
                     <path d="M15.4847 74.8394H20.646C21.3585 74.8394 21.9363 74.2617 21.9363 73.5491C21.9363 72.8365 21.3585 72.2588 20.646 72.2588H15.4847C14.7721 72.2588 14.1943 72.8365 14.1943 73.5491C14.1943 74.2617 14.7721 74.8394 15.4847 74.8394Z" fill="#2E3A5B" />
                     <path d="M24.0261 74.736C24.181 74.8022 24.348 74.8369 24.5162 74.8394C25.0404 74.8419 25.5148 74.5275 25.7158 74.0436C25.9168 73.5598 25.8047 73.0016 25.4323 72.633C25.0612 72.2663 24.5068 72.1598 24.0261 72.3614C23.8679 72.4238 23.7236 72.5158 23.6002 72.633C23.3639 72.88 23.2303 73.2069 23.2259 73.5491C23.2139 74.0739 23.5346 74.5502 24.0261 74.736Z" fill="#2E3A5B" />
                     <path d="M52.8759 33.2916C52.8633 33.2109 52.8374 33.1322 52.7996 33.0591C52.7713 32.9772 52.7322 32.8991 52.6837 32.8272L52.5287 32.6338C52.0114 32.1562 51.2138 32.1562 50.6965 32.6338C50.6411 32.6949 50.5894 32.7592 50.5415 32.8272C50.493 32.8991 50.4539 32.9772 50.4256 33.0591C50.3884 33.1322 50.3626 33.2109 50.3481 33.2916C50.3336 33.3773 50.3254 33.4629 50.3223 33.5499C50.3267 33.8914 50.4602 34.219 50.6965 34.466C50.9422 34.7041 51.2705 34.8377 51.6126 34.8402C51.956 34.8434 52.2861 34.7085 52.5293 34.466C52.7719 34.2234 52.9067 33.8926 52.9029 33.5499C52.9004 33.4629 52.8916 33.3766 52.8759 33.2916Z" fill="#2E3A5B" />
                  </svg>

                  <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 20px;
                line-height: 28px;
                color: #2e3a5b;
                padding: 20px 0px;
              ">
                     Tiêu chuẩn
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div style="background-color: #ffffff ; padding: 40px 0px">
         <div class="mt-5">
            <div style="
              font-family: 'Montserrat';
              font-style: normal;
              font-weight: 600;
              font-size: 32px;
              line-height: 40px;
              color: #2e3a5b;
              background:'#ffffff'
            " class="py-4">
               Câu hỏi thường gặp
            </div>
            <div class="d-flex px-2 py-2 mb-2" style="border: 1px solid grey; border-radius: 5px">
               <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 16px;
                line-height: 24px;
                color: #2e3a5b;
              ">
                  1. Hợp đồng bảo hiểm sẽ được gửi đến khách hàng như thế nào
               </div>
               <div style="margin-left: auto; padding-right: 5px; text-align: center">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99479 0.667969C8.36298 0.667969 8.66146 0.966446 8.66146 1.33464V14.668C8.66146 15.0362 8.36298 15.3346 7.99479 15.3346C7.6266 15.3346 7.32812 15.0362 7.32812 14.668V1.33464C7.32812 0.966446 7.6266 0.667969 7.99479 0.667969Z" fill="#596481" />
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M0.664062 8.0026C0.664062 7.63441 0.962539 7.33594 1.33073 7.33594H14.6641C15.0323 7.33594 15.3307 7.63441 15.3307 8.0026C15.3307 8.37079 15.0323 8.66927 14.6641 8.66927H1.33073C0.962539 8.66927 0.664062 8.37079 0.664062 8.0026Z" fill="#596481" />
                  </svg>
               </div>
            </div>
            <div class="d-flex px-2 py-2 mb-2" style="border: 1px solid grey; border-radius: 5px">
               <svg width="40" height="40" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M13 1C13 0.723858 13.2239 0.5 13.5 0.5H23C23.2761 0.5 23.5 0.723858 23.5 1V7.5C23.5 7.77614 23.2761 8 23 8H17.6667L13.8 10.9C13.6485 11.0136 13.4458 11.0319 13.2764 10.9472C13.107 10.8625 13 10.6894 13 10.5V1ZM14 1.5V9.5L17.2 7.1C17.2865 7.03509 17.3918 7 17.5 7H22.5V1.5H14Z" fill="#C40000" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.0583 16.9303C3.14339 16.4962 4.8524 16 7 16C9.14761 16 10.8566 16.4962 11.9417 16.9303L11.9419 16.9303C12.8909 17.3103 13.5 18.2328 13.5 19.247V21C13.5 21.2761 13.2761 21.5 13 21.5H1C0.723858 21.5 0.5 21.2761 0.5 21V19.247C0.5 18.2333 1.109 17.3104 2.05815 16.9303L2.0583 16.9303ZM2.4297 17.8587C1.86793 18.0837 1.5 18.6337 1.5 19.247V20.5H12.5V19.247C12.5 18.6333 12.1321 18.0838 11.5703 17.8587C10.5754 17.4608 8.9934 17 7 17C5.00671 17 3.42478 17.4607 2.42985 17.8587" fill="#C40000" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6.5C5.34314 6.5 4 7.84314 4 9.5C4 10.3473 4.34984 11.3723 4.93147 12.1835C5.51867 13.0025 6.26205 13.5 7 13.5C7.73795 13.5 8.48133 13.0025 9.06853 12.1835C9.65016 11.3723 10 10.3473 10 9.5C10 7.84314 8.65686 6.5 7 6.5ZM3 9.5C3 7.29086 4.79086 5.5 7 5.5C9.20914 5.5 11 7.29086 11 9.5C11 10.5857 10.5663 11.8107 9.88122 12.7662C9.20167 13.714 8.19505 14.5 7 14.5C5.80495 14.5 4.79833 13.714 4.11878 12.7662C3.43366 11.8107 3 10.5857 3 9.5Z" fill="#C40000" />
               </svg>

               <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 24px;
                color: #596481;
                margin-left: 10px;
                margin-top: 10px;
              ">
                  "Khi mua và thanh toán thành công sản phẩm bảo hiểm sức khỏe,
                  khách hàng sẽ được cấp giấy chứng nhận bảo hiểm điện tử do One
                  Care phát hành qua email đã đăng ký. Giấy chứng nhận điện tử có
                  đầy đủ giá trị pháp lý theo quy định tại Nghị định 52/2013/NĐ-CP
                  ngày 16/05/2013 của Chính phủ về Thương mại điện tử."
               </div>
            </div>
            <div class="d-flex px-2 py-2 mb-2" style="border: 1px solid grey; border-radius: 5px">
               <div style="
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 16px;
                line-height: 24px;
                color: #2e3a5b;
              ">
                  2. Hợp đồng bảo hiểm sẽ được gửi đến khách hàng như thế nào
               </div>
               <div style="margin-left: auto; padding-right: 5px; text-align: center">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99479 0.667969C8.36298 0.667969 8.66146 0.966446 8.66146 1.33464V14.668C8.66146 15.0362 8.36298 15.3346 7.99479 15.3346C7.6266 15.3346 7.32812 15.0362 7.32812 14.668V1.33464C7.32812 0.966446 7.6266 0.667969 7.99479 0.667969Z" fill="#596481" />
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M0.664062 8.0026C0.664062 7.63441 0.962539 7.33594 1.33073 7.33594H14.6641C15.0323 7.33594 15.3307 7.63441 15.3307 8.0026C15.3307 8.37079 15.0323 8.66927 14.6641 8.66927H1.33073C0.962539 8.66927 0.664062 8.37079 0.664062 8.0026Z" fill="#596481" />
                  </svg>
               </div>
            </div>
         </div>
         <div class="d-flex px-2 py-2 mb-2" style="border: 1px solid grey; border-radius: 5px">
            <div style="
              font-family: 'Montserrat';
              font-style: normal;
              font-weight: 500;
              font-size: 16px;
              line-height: 24px;
              color: #2e3a5b;
            ">
               3. Hợp đồng bảo hiểm sẽ được gửi đến khách hàng như thế nào
            </div>
            <div style="margin-left: auto; padding-right: 5px; text-align: center">
               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99479 0.667969C8.36298 0.667969 8.66146 0.966446 8.66146 1.33464V14.668C8.66146 15.0362 8.36298 15.3346 7.99479 15.3346C7.6266 15.3346 7.32812 15.0362 7.32812 14.668V1.33464C7.32812 0.966446 7.6266 0.667969 7.99479 0.667969Z" fill="#596481" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.664062 8.0026C0.664062 7.63441 0.962539 7.33594 1.33073 7.33594H14.6641C15.0323 7.33594 15.3307 7.63441 15.3307 8.0026C15.3307 8.37079 15.0323 8.66927 14.6641 8.66927H1.33073C0.962539 8.66927 0.664062 8.37079 0.664062 8.0026Z" fill="#596481" />
               </svg>
            </div>
         </div>
         <div class="d-flex px-2 py-2 mb-2" style="border: 1px solid grey; border-radius: 5px">
            <div style="
              font-family: 'Montserrat';
              font-style: normal;
              font-weight: 500;
              font-size: 16px;
              line-height: 24px;
              color: #2e3a5b;
            ">
               4. Hợp đồng bảo hiểm sẽ được gửi đến khách hàng như thế nào
            </div>
            <div style="margin-left: auto; padding-right: 5px; text-align: center">
               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99479 0.667969C8.36298 0.667969 8.66146 0.966446 8.66146 1.33464V14.668C8.66146 15.0362 8.36298 15.3346 7.99479 15.3346C7.6266 15.3346 7.32812 15.0362 7.32812 14.668V1.33464C7.32812 0.966446 7.6266 0.667969 7.99479 0.667969Z" fill="#596481" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.664062 8.0026C0.664062 7.63441 0.962539 7.33594 1.33073 7.33594H14.6641C15.0323 7.33594 15.3307 7.63441 15.3307 8.0026C15.3307 8.37079 15.0323 8.66927 14.6641 8.66927H1.33073C0.962539 8.66927 0.664062 8.37079 0.664062 8.0026Z" fill="#596481" />
               </svg>
            </div>
         </div>
      </div>

   </div>
   <?php woocommerce_output_related_products() ?>
   </div>
   </div>
</section>

<?php get_footer(); ?>