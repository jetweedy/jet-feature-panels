<?php
header("Content-type:text/plain");
define('WP_USE_THEMES', false);
require ('../../../wp-load.php');

$action = isset($_GET['action']) ? $_GET['action'] : "";
$action = isset($_POST['action']) ? $_POST['action'] : $action;

/*
5345
*/
switch($action) {
    case "getLongText":
//		sleep(2);
		$post_id = $_GET['post_id'];
//	    $post = get_post($post_id);
		$longtext = get_field("long_text", $post_id);
		print $longtext;
    default:
        break;
}

?>