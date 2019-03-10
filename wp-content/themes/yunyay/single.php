<?php
	$post = $wp_query->post;
	if ('post_type' == 'cabana') {
		include(TEMPLATEPATH.'/single-cabana.php');
	}
	elseif (in_category('7'))
	{
		include(TEMPLATEPATH.'/single-default.php');
	}
?>