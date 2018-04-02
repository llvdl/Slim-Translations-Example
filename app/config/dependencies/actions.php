<?php

use Interop\Container\ContainerInterface;
use App\Action\StartAction;
use App\Action\HomeAction;
use App\Action\UpdateNameAction;

return [
    StartAction::class => function (ContainerInterface $container) {
        return new StartAction($container->get('router'));
    },
    HomeAction::class => function (ContainerInterface $container) {
        return new HomeAction($container->get('view'));
    },
    UpdateNameAction::class => function (ContainerInterface $container) {
        return new UpdateNameAction(
            $container->get('view'),
            $container->get('translator'),
            $container->get('router')
        );
    }
];
