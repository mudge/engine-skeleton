<?php
declare(strict_types=1);

/**
 * Ensure all encoding is in UTF-8.
 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Engine\{Router, Request, Response};

/**
 * Set up logging.
 *
 * By default, this will log INFO-level messages to ../log/app.log
 */
$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::INFO));

/**
 * Set up templating.
 *
 * By default, this will load templates from ../templates and cache them
 * to ../tmp (you may want to disable the cache during development)
 */
$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new \Twig_Environment($loader, ['cache' => __DIR__ . '/../tmp']);

/**
 * Set up the request and response.
 */
$request = Request::fromGlobals();
$response = new Response($twig, $logger);

/**
 * Set up the router.
 *
 * Add any routes of your own here, e.g.
 *
 *     $router->get('/login', 'App\SessionsController', 'new');
 *     $router->post('/login', 'App\SessionsController', 'create');
 */
$router = new Router($logger);
$router->root('App\HomepageController', 'index');

/**
 * Serve the request with the response.
 */
$router->route($request, $response);
