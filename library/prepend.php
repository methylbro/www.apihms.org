<?php

/* using configuration file */
require '../config/config.php';

/* loading system */
require '../library/system/core.php';
require '../library/system/module.php';

$Core = new Core();

/* adding modules */
$modules = parse_ini_file('../config/modules.ini', false);
foreach($modules as $module_name => $is_active) {
    if ($is_active) {
        require '../library/modules/'.$module_name.'/'.$module_name.'.php';
        $Module = new $module_name($Core);
        $Core->attach($Module)->loadedModule($Module, '../library/modules/'.$module_name.'/');
    }
}

/* session garbage collector */
$sess_save_path = session_save_path();
$maxlifetime    = ini_get('session.gc_maxlifetime');
foreach (glob("$sess_save_path/sess_*") as $filename) {
    if (filemtime($filename) + $maxlifetime < time()) {
        @unlink($filename);
    }
}

/* */
session_start();

?>