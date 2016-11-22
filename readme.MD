An example application based on Slim Framework 3 that uses [Twig](http://twig.sensiolabs.org/) for rendering and
[illuminate/translation](https://github.com/illuminate/translation) for translations.

The application creates a Translator instance and registers the `trans` and `transChoice` functions so they can
be used in Twig templates.

The setup of the view and the translator can be found in `app/bootstrap.php`.

The Twig views are stored in `app/views`. Translation files are stored in `app/translations`. These paths are configured in `app/bootstrap.php`.
