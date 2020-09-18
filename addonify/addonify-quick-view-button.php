<?php

	// direct access is disabled
	defined( 'ABSPATH' ) || exit;

	defined( 'ADDONIFY_QUICK_VIEW_VERSION' ) || exit;

	?>
	<a href="" title="<?php esc_attr_e( 'Quick View', 'galaxy-store' ); ?>" class="addonify-qvm-button button" data-product_id="<?php the_ID(); ?>" rel="nofollow" >
		<i class="icon-magnifier"></i>
	</a>
