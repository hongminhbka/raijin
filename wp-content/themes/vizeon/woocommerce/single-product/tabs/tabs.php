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

	<div style="background-color: #2E3A5B; padding: 40px 0px " >
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
				color: white;">
				Raijin có đủ sản phẩm cho tất cả các dòng xe
			</div>
			<div class="d-flex justify-space-between">
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color: '#2E3A5B'">Honda</button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">Yamaha</button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">Piaggio</button>
				<button type="button" class="btn btn-lg" style="background-color: white; width: 262px ; height:auto; color:'#2E3A5B'">Xe hãng khác</button>
			</div>
		</div>

	</div>

<?php endif; ?>