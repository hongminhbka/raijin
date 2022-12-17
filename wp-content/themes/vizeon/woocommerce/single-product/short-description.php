<?php

/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $post;

if (!$post->post_excerpt) return;
?>
<div itemprop="description">
	<?php echo apply_filters('woocommerce_short_description', $post->post_excerpt) ?>
	<div class="d-flex">
		<div class="font-weight-normal mr-2">Chia sẻ : </div>
		<div class="d-flex align-center">
			<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default">Left</button>
				<button type="button" class="btn btn-default">Middle</button>
				<button type="button" class="btn btn-default">Right</button>
			</div>
		</div>
	</div>
</div>