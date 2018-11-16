<?php

use DI\ContainerBuilder;

define('ROOT', dirname(__DIR__));
define('ROOT_VIEW', ROOT.'/view');

require ROOT.'/vendor/autoload.php';
require ROOT.'/lib.php';
require ROOT.'/action.php';

$dotenv = new Dotenv\Dotenv(ROOT);
$dotenv->load();

$config_file = ROOT.'/config.ini';
if (!is_file($config_file) || !is_readable($config_file))
    die("no config.ini");
$config = parse_ini_file($config_file);

if ($_ENV['DEBUG']) {
    error_reporting(E_ALL);
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(ROOT . '/config_di.php');
$container = $containerBuilder->build();

$dotenv->required(['redis_host'])->notEmpty();

$router = new \Bramus\Router\Router();
$router->get('/', 'action_index');
$router->get('/r/(\w+)/?', 'action_r');
$router->get('/r/(\w+)/comments/(\w+)/?', 'action_comment');
$router->get('/user', 'action_user');

$router->run();