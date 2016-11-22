<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Interop\Container\ContainerInterface;
use Slim\App;
use Slim\Views\Twig;
use Llvdl\App\Twig\TranslatorExtension;

require __DIR__ . '/../vendor/autoload.php';

$configuration = [
    // settings
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'view_path' => __DIR__ . '/views/', // path to the Twig views
        'translations_path' => __DIR__ . '/translations/' // path to the translation files
    ],
    // dependencies
    'view' => function (ContainerInterface $container) {
        $view = new Twig($container->get('settings')['view_path']);

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
        $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

        // add translator functions to Twig
        $view->addExtension(new TranslatorExtension($container->get('translator')));

        return $view;
    },
    'translator' => function (ContainerInterface $container) {
        $loader = new FileLoader(new Filesystem(), $container->get('settings')['translations_path']);
        // Register the Dutch translator (set to "en" for English)
        $translator = new Translator($loader, "nl");

        return $translator;
    }
];

$app = new App($configuration);
