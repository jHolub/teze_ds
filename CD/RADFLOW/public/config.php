<?php

// system var
namespace GLOBALVAR;

$project = 'dev_final_radflow';

$server = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];
$url = str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']);
define(__NAMESPACE__ . "\ROOT", "http://" . $server . ":" . $port . $url);

$root = $_SERVER["DOCUMENT_ROOT"] . "/";

define(__NAMESPACE__ . '\BASE_PATH', $root . $project);
define(__NAMESPACE__ . '\SETTING_PATH', $root . $project . "/setting");
define(__NAMESPACE__ . '\LIB_PATH', $root . $project . "/libs");

define(__NAMESPACE__ . '\ERROR_PATH', $root . $project . "/setting/log_error.txt");

define(__NAMESPACE__ . '\CORE_PATH', $root . $project . "/core");
define(__NAMESPACE__ . '\CONTROLLERS_PATH', $root . $project . "/core/controllers");
define(__NAMESPACE__ . '\MODELS_PATH', $root . $project . "/core/models");
define(__NAMESPACE__ . '\VIEWS_PATH', $root . $project . "/core/views");

// drutes gui global var
define(__NAMESPACE__ .'\USERLOGFILE_PATH', $root.$project."/setting/user_accounts.txt");
define(__NAMESPACE__ .'\USERDEPO_PATH', $root.$project."/depo");

define(__NAMESPACE__ . '\DEV_ENVIROMENT', true);

// Check if rewrite mode is enabled
if (function_exists('apache_get_modules')) {
  $modules = apache_get_modules();
  $mod_rewrite = in_array('mod_rewrite', $modules);
  define(__NAMESPACE__ . '\MOD_REWRITE', $mod_rewrite); 
} else {
  $mod_rewrite =  getenv('HTTP_MOD_REWRITE')=='On' ? true : false ;
  define(__NAMESPACE__ . '\MOD_REWRITE', $mod_rewrite);
}
?>

