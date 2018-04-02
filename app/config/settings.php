<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Interop\Container\ContainerInterface;
use Slim\App;
use Slim\Views\Twig;
use App\Twig\TranslatorExtension;
use App\Middleware\LocaleMiddleware;
use App\Action\StartAction;
use App\Action\HomeAction;
use App\Action\UpdateNameAction;

return [
    // settings
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'view_path' => __DIR__ . '/../templates/', // path to the Twig templates
        'translations_path' => __DIR__ . '/../translations/', // path to the translation files,
        'allowed_locales' => ['en', 'nl'],
        'default_locale' => 'nl'
    ]
];
