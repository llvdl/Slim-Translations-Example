<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Router;
use Illuminate\Contracts\Translation\Translator;

/**
 * Shows the home page.
 */
class UpdateNameAction
{
  /**
   * @var Twig
   */
    private $view;

  /**
   * @var Translator
   */
    private $translator;

  /**
   * @var Router
   */
    private $router;

    public function __construct(Twig $view, Translator $translator, Router $router)
    {
        $this->view = $view;
        $this->translator = $translator;
        $this->router = $router;
    }

    public function __invoke(Request $request, Response $response)
    {
        $errors = [];

        $name = array_key_exists('name', $_SESSION) ? $_SESSION['name'] : 'Person';

        if ($request->getMethod() === 'POST') {
            $params = $request->getParsedBody();
            if (array_key_exists('name', $params) && $params['name'] !== '') {
                $name = $params['name'];

                // update the change count if the name has changed.
                if (!isset($_SESSION['name']) || $_SESSION['name'] !== $name) {
                    $_SESSION['change_count'] = array_key_exists('change_count', $_SESSION)
                    ? 1 + $_SESSION['change_count'] : 1;
                }

                $_SESSION['name'] = $name;

                $locale = $request->getAttribute('locale');

                return $response->withRedirect($this->router->pathFor('home', ['locale' => $locale]));
            } else {
                $errors[] = $this->translator->trans(
                    'messages.error.field_may_not_be_empty',
                    ['name' => $this->translator->trans('messages.label.name')]
                );
            }
        }

        return $this->view->render($response, 'edit_name.html.twig', [
        'name' => $name,
        'errors' => $errors
        ]);
    }
}
