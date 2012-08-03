<?php 
header('Content-type: text/css');
$http = 'http';
if( isset($_SERVER['HTTPS']) ) { $http .= "s"; }
$domain_url = $http."://".$_SERVER['SERVER_NAME'];
if ( isset($_GET['subdir']) ) { $domain_url .= "/" . $_GET['subdir']; }
$theme_events_path = '/wp-content/themes/' . $_GET['theme'] . '/events/';
$plugs = $_GET['plugs'];
$user = $_GET['user'];
$count = count($plugs);
$css = array();
for ($i = 0; $i < $count; $i++) {
	$css[] = '@import url("' . $plugs[$i] . '");';
	$css[] = '@import url("' . $domain_url . $theme_events_path . $user[$i] . '");';
}
$content = implode("\n", $css);
echo $content;
?>