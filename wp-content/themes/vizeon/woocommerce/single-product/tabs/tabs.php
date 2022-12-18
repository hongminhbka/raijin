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
	<?php $tabs = [$tabs[1], $tabs[0]] ?>
	<div class="woocommerce-tabs clearfix tabs-left">
		<div class="woocommerce-tabs-inner clear fix">
			<div class="tab-content col-xs-12">
				<?php foreach ($tabs as $key => $tab) : ?>
					<div class="tab-pane<?php echo esc_attr(' active'); ?>" id="tab-<?php echo esc_attr($key); ?>">
						<?php call_user_func($tab['callback'], $key, $tab) ?>
					</div>
				<?php
				endforeach; ?>
			</div>

		</div>
	</div>

<?php endif; ?>