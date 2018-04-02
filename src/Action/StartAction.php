<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Router;

/**
 * Start page.
 */
class StartAction
{
  /**
   * @var Router
   */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function __invoke(Request $request, Response $response)
    {
        $locale = $request->getAttribute('locale');

        // redirect to homepage in current locale
        return $response->withRedirect($this->router->pathFor('home', ['locale' => $locale]));
    }
}
