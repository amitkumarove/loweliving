<?php

$current = get_queried_object();

$url = get_post_type_archive_link('project');
$url = add_query_arg('division', $current->slug, $url);

wp_redirect($url);