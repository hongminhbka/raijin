<?php

/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product, $woocommerce_loop;
$posts_per_page = 5;
$related = wc_get_related_products($product->get_id(), $posts_per_page);

if (sizeof($related) == 0) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array($product->get_id())
));
$show = 4;
$products = new WP_Query($args);

$woocommerce_loop['columns'] = $columns;

if ($products->have_posts()) : ?>

	<div class="widget related products py-5" style="background-image:url('/wp-content/uploads/2015/12/bg_product_details_splq.jpg');">
		<div class="container">
			<div style="font-family: 'Montserrat';
			font-style: normal;
			font-weight: 600;
			font-size: 32px;
			line-height: 40px;
			color:#2E3A5B" class="widget-title"><?php echo esc_html(vizeon_get_option('related_heading_text', 'Related Products')) ?></div>
		</div>
		<div style="background-color: #ffffff !important; padding: 15px 0px;">
			<div class="products carousel-view count-row-1 container justify-space-between">
				<div class="init-carousel-owl-theme owl-carousel" data-items="<?php echo esc_attr($show); ?>" data-nav="true">
					<?php while ($products->have_posts()) : $products->the_post(); ?>

						<?php wc_get_template_part('content', 'product'); ?>

					<?php endwhile; // end of the loop. 
					?>
				</div>
			</div>
			?>
		</div>

	</div>

<?php endif;

wp_reset_postdata();
