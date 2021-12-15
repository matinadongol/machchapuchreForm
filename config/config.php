<?php
ob_start();
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'form');
define('DB_PASSWORD', '');

define('SITE_URL', 'http://localhost/machchapuchreForm/');

define('ADMIN_URL', SITE_URL.'admin/');
define('ADMIN_ASSETS_URL',ADMIN_URL.'assets/');
define('ADMIN_CSS_URL', ADMIN_ASSETS_URL.'css/');
define('ADMIN_JS_URL', ADMIN_ASSETS_URL.'js/');
define('ADMIN_IMAGES_URL', ADMIN_ASSETS_URL.'images/');
//define('ADMIN_VENDORS_URL', ADMIN_ASSETS_URL.'vendors/');

define('ALLOWED_EXTENSION', array('jpg', 'jpeg', 'png', 'gif', 'bmp'));

define('UPLOAD_URL', SITE_URL.'upload/');
define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/upload/');

$conn= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('database connection failed.');
mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

mysqli_query($conn, "SET NAMES utf8"); //unicode characters are saved as same in database

    

?>