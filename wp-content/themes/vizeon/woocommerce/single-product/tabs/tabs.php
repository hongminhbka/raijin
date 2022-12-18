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
	<div class="woocommerce-tabs clearfix tabs-left">
		<div class="woocommerce-tabs-inner clear fix">
			<div class="tab-content col-xs-12">
				<?php foreach ($tabs as $key => $tab) : ?>
					<?php $text = $key != 'description'   ? "Thông số kỹ thuật" : 'Nội dung' ?>
					<div style="font-family: 'Montserrat';
						font-style: normal;
						font-weight: 500;
						font-size: 20px;
						color: #2E3A5B;
						padding: 10px 0px;
						line-height: 28px;">
						<?php echo $text ?>
					</div>
					<div class="tab-pane<?php echo esc_attr(' active'); ?>" id="tab-<?php echo esc_attr($key); ?>">
						<?php call_user_func($tab['callback'], $key, $tab) ?>
					</div>
				<?php
				endforeach; ?>
			</div>

		</div>
	</div>

<?php endif; ?>