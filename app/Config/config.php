<?php
// define site url
define('BURL',"http://scandiwebapp.local/");

/**
 * database configuration
 */
if(!defined("DB_TYPE")){
    define("DB_TYPE", "mysql");
}
if(!defined("DB_HOST")){
    define("DB_HOST", "localhost");
}
if(!defined("DB_NAME")){
    define("DB_NAME", "scandiproduct");
}
if(!defined("DB_PWD")){
    define("DB_PWD", "mysql");
}
if(!defined("DB_USER")){
    define("DB_USER", "root");
}
?>