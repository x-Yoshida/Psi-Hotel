<?php

$pattern = [
	'title'      => __( 'Posts - Layout 3', 'blocksy-companion' ),
	'categories' => ['blocksy'],
	'blockTypes' => ['blocksy/query'],

	'content' => '<!-- wp:blocksy/query {"uniqueId":"3687fdbe","limit":6} -->
	<div class="wp-block-blocksy-query"><!-- wp:blocksy/post-template {"layout":{"type":"grid","columnCount":3},"style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
	<!-- wp:blocksy/dynamic-data {"field":"wp:featured_image","aspectRatio":"1","style":{"spacing":{"margin":{"bottom":"0"}},"border":{"radius":"20px"}},"has_field_link":"yes"} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:blocksy/dynamic-data {"tagName":"h2","style":{"typography":{"fontSize":"20px"}},"has_field_link":"yes"} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group"><!-- wp:blocksy/dynamic-data {"field":"wp:author_avatar","avatar_size":40,"style":{"border":{"radius":"100%"}}} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group"><!-- wp:blocksy/dynamic-data {"field":"wp:author","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"has_field_link":"yes"} /-->

	<!-- wp:blocksy/dynamic-data {"field":"wp:date","style":{"typography":{"fontSize":"14px"}}} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	<!-- /wp:blocksy/post-template --></div>
	<!-- /wp:blocksy/query -->'
];
