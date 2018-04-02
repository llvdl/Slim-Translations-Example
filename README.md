Slim Translations example
===

An example application based on Slim Framework 3 that uses [Twig](http://twig.sensiolabs.org/) for rendering and
[illuminate/translation](https://github.com/illuminate/translation) for translations.

The application creates a Translator instance and registers the `trans` and `transChoice` functions so they can
be used in Twig templates.

The setup of the view and the translator can be found in `app/config/dependencies.php`.

The Twig templates are stored in `app/templates`. Translation files are stored in `app/translations`. These paths are configured in `app/bootstrap.php`.

The current language is set using middleware (see [App\MiddleWare\LocaleMiddleware](./src/Middleware/LocaleMiddleware.php)):

* It looks for the current locale in the URL path, e.g. "/en/home" yields "en"
* Otherwise it looks for the locale set in the current session
* Otherwise it uses the default locale.

The icons were made by [cactus cowboy](https://openclipart.org/user-detail/cactus%20cowboy).

Installation
---

After cloning this repository, install the dependencies using [composer](https://getcomposer.org/):

    composer install

Note: You may need to install the [php mbstring extension](http://php.net/mbstring). When running `composer install`, you will be notified if this is the case.

Running
---

Start the PHP built-in web server from the terminal:

    php -S localhost:8000 -t web

If the server has succesfully started, open the following url in your browser: http://localhost:8000
