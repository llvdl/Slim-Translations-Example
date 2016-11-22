<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require_once __DIR__ . '/../app/bootstrap.php';

/** @var App $app */
$app->get('/', function (Request $request, Response $response) {
    return $this->view->render($response, 'home.html.twig', [
        'name' => 'Person'
    ]);
});

$app->run();
