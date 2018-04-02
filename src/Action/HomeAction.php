<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

/**
 * Shows the home page.
 */
class HomeAction
{
  /**
   * @var Twig
   */
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response)
    {
        $name = array_key_exists('name', $_SESSION) ? $_SESSION['name'] : 'Person';
        $nameChangeCount = array_key_exists('change_count', $_SESSION) ? $_SESSION['change_count'] : 0;

        return $this->view->render($response, 'home.html.twig', [
        'name' => array_key_exists('name', $_SESSION) ? $_SESSION['name'] : 'Person',
        'nameChangeCount' => $nameChangeCount
        ]);
    }
}
