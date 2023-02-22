<?php
declare(strict_types=1);

namespace Salle\PixSalle\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class PasswordController
{
    private Twig $twig;

    public function __construct(
        Twig $twig,
    ) {
        $this->twig = $twig;
    }
    
    public function renderPasswordPage(Request $request, Response $response): Response
    {
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();

        return $this->twig->render(
            $response,
            'password.twig',
            [
                'formAction' => $routeParser->urlFor('profile/changePassword')
            ]
        );
    }
}