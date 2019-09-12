<?
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
define('ROOT',dirname(__FILE__));
require(ROOT.'/components/Autoload.php');
$routs = new Router;
$routs -> run();
?>