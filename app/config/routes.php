<?php

use Slim\App;
use App\Action\StartAction;
use App\Action\HomeAction;
use App\Action\UpdateNameAction;

/** @var App $app */
$app->get('/', StartAction::class);
$app->get('/{locale}/home', HomeAction::class)->setName('home');
$app->map(['GET', 'POST'], '/{locale}/name', UpdateNameAction::class)->setName('update_name');
