<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use App\Twig\TranslatorExtension;

return [
    'view' => function (ContainerInterface $container) {
        $view = new Twig($container->get('settings')['view_path']);

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
        $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

        $settings = $container->get('settings');

        // add translator functions to Twig
        $view->addExtension(
            new TranslatorExtension($container->get('translator'), $settings['allowed_locales'])
        );

        return $view;
    },
    'translator' => function (ContainerInterface $container) {
        $loader = new FileLoader(new Filesystem(), $container->get('settings')['translations_path']);
        $settings = $container->get('settings');

        $translator = new Translator($loader, $settings['default_locale']);

        return $translator;
    },
];
