<?php
if ( !defined('ABSPATH') || !defined('WP_UNINSTALL_PLUGIN') ) return;

delete_option('widget_wppp');
delete_option('wppp_cache');

?>
