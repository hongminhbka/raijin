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

	<div class="woocommerce-tabs clearfix tabs-left container" style="background-color: #2E3A5B; padding: 20px 0px">
		<div style="font-family: 'Montserrat';
				font-style: normal;
				font-weight: 600;
				font-size: 32px;
				line-height: 40px;">
			Bạn đang tìm sản phẩm cho xe gì
		</div>
		<div style="
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		font-size: 16px;
		line-height: 24px;">
			Raijin có đủ sản phẩm cho tất cả các dòng xe
		</div>
		<div class="d-flex justify-space-between">
			<button type="button" class="btn btn-lg" style="background-color: white; padding: 5px 15px">Honda</button>
			<button type="button" class="btn btn-lg" style="background-color: white; padding: 5px 15px">Yamaha</button>
			<button type="button" class="btn btn-lg" style="background-color: white; padding: 5px 15px">Piaggio</button>
			<button type="button" class="btn btn-lg" style="background-color: white; padding: 5px 15px">Xe hãng khác</button>
		</div>

	</div>

<?php endif; ?>