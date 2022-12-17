<?php

/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

$_count = 0;

if (!empty($tabs)) : ?>
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
			<div class="d-flex" style="justify-content: space-between;">
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color: '#2E3A5B'">
					<span style="color: #2E3A5B">
						Honda
					</span>
				</button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">
					<span style="color: #2E3A5B">
						Yamaha
					</span></button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">
					<span style="color: #2E3A5B">
						Piagio
					</span></button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">
					<span style="color: #2E3A5B">
						Xe hãng khác
					</span>
				</button>
			</div>
		</div>

	</div>

	<div class="woocommerce-tabs clearfix tabs-left">
		<div class="woocommerce-tabs-inner clear fix">
			<div class="woocommerce-tab-product-nav">
				<ul class="woocommerce-tab-product-info nav nav-tabs default clear-list">
					<?php foreach ($tabs as $key => $tab) : ?>
						<li class="<?php echo esc_attr($key); ?>_tab<?php echo esc_attr(($_count == 0 ? ' active' : '')); ?>">
							<a data-toggle="tab" href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key) ?></a>
						</li>
					<?php $_count++;
					endforeach; ?>
				</ul>
			</div>
			<?php $_count = 0; ?>
			<div class="tab-content col-xs-12">
				<?php foreach ($tabs as $key => $tab) : ?>
					<div class="tab-pane<?php echo esc_attr(($_count == 0 ? ' active' : '')); ?>" id="tab-<?php echo esc_attr($key); ?>">
						<?php call_user_func($tab['callback'], $key, $tab) ?>
					</div>
				<?php $_count++;
				endforeach; ?>
			</div>
		</div>
	</div>

<?php endif; ?>