<?php
define("DS",DIRECTORY_SEPARATOR);
define("ROOT_PATH",dirname(__DIR__).DS);
define("APP",ROOT_PATH.'app'.DS);
define("CORE",APP.'Core'.DS);
define("CONFIG",APP.'Config'.DS);
define("CONTROLLER",APP.'Controller'.DS);
define("MODEL",APP.'Model'.DS);
define("VIEW",APP.'View'.DS);
define("UPLOAD",ROOT_PATH.'public'.DS.'upload'.DS);
//define('CSS_PATH', ROOT_PATH.'public'.DS.'assets'.DS.'css'.DS);
require_once(CONFIG.'config.php');
require_once(CONFIG.'helper.php');

// autoload all classes
$modules = [ROOT_PATH,APP,CORE,CONFIG,CONTROLLER,MODEL,VIEW];
set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload');

//new App();