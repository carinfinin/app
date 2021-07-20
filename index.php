<?
define ('VG_ACCESS', true);
header('Content-Type:text/html; Charset=utf-8');
session_start();
require_once 'config.php';
require_once 'base/settings/internal_settings.php';
require_once 'libraries/functions.php';

echo 'gggggggg';

use  base\controller\RouteController;
use  base\exceptions\RouteException;


try {
    RouteController::getInstance();
}
catch (RouteException $e) {
    exit($e->getMessage());
}







































