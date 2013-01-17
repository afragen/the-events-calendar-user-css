<?php
header('Content-type: text/css');
$http = 'http';
if( isset($_SERVER['HTTPS']) ) { $http .= "s"; }
$domain_url = $http."://".$_SERVER['SERVER_NAME'];
if ( isset($_GET['subdir']) ) { $domain_url .= "/" . $_GET['subdir']; }
isset($_GET['theme']) ? $theme = $_GET['theme'] : $theme = '1';
isset($_GET['plugs']) ? $plugs = $_GET['plugs'] : $plugs = '1';
isset($_GET['user']) ? $user = $_GET['user'] : $user = '1';
$theme_events_path = '/wp-content/themes/' . $_GET['theme'] ;
$count = count($plugs);
$css = array();
for ($i = 0; $i < $count; $i++) {
	$css[] = '@import url("' . $plugs[$i] . '");';
	$css[] = '@import url("' . $domain_url . $theme_events_path . $user[$i] . '");';
}
$content = implode("\n", $css);
echo $content;
