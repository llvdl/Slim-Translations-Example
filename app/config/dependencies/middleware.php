<?php

use Interop\Container\ContainerInterface;
use App\Middleware\LocaleMiddleware;

return [
    'middleware.locale' => function (ContainerInterface $container) {
        $settings = $container->get('settings');

        return new LocaleMiddleware(
            $container->get('translator'),
            $settings['allowed_locales'],
            $settings['default_locale']
        );
    }
];
