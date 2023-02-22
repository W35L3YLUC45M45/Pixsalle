<?php
declare(strict_types=1);

namespace Salle\PixSalle\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class WalletController
{
    private Twig $twig;

    public function __construct(
        Twig $twig,
    ) {
        $this->twig = $twig;
    }

    public function renderWalletPage(Request $request, Response $response): Response
    {
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();

        return $this->twig->render(
            $response,
            'wallet.twig',
            [
                'formAction' => $routeParser->urlFor('user/wallet')
            ]
        );
    }
}