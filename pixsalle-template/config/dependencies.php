<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Salle\PixSalle\Controller\SignUpController;
use Salle\PixSalle\Controller\LandingController;
use Salle\PixSalle\Controller\UserSessionController;
use Salle\PixSalle\Controller\ExploreController;
use Salle\PixSalle\Controller\ProfileController;
use Salle\PixSalle\Controller\PasswordController;
use Salle\PixSalle\Controller\MembershipsController;
use Salle\PixSalle\Controller\WalletController;
use Salle\PixSalle\Controller\PortfolioController;
use Salle\PixSalle\Controller\BlogsController;
use Salle\PixSalle\Repository\MySQLUserRepository;
use Salle\PixSalle\Repository\PDOConnectionBuilder;
use Slim\Views\Twig;

function addDependencies(ContainerInterface $container): void
{
    $container->set(
        'view',
        function () {
            return Twig::create(__DIR__ . '/../templates', ['cache' => false]);
        }
    );

    $container->set('db', function () {
        $connectionBuilder = new PDOConnectionBuilder();
        return $connectionBuilder->build(
            $_ENV['MYSQL_ROOT_USER'],
            $_ENV['MYSQL_ROOT_PASSWORD'],
            $_ENV['MYSQL_HOST'],
            $_ENV['MYSQL_PORT'],
            $_ENV['MYSQL_DATABASE']
        );
    });

    $container->set('user_repository', function (ContainerInterface $container) {
        return new MySQLUserRepository($container->get('db'));
    });

    $container->set(
        UserSessionController::class,
        function (ContainerInterface $c) {
            return new UserSessionController($c->get('view'), $c->get('user_repository'));
        }
    );

    $container->set(
        SignUpController::class,
        function (ContainerInterface $c) {
            return new SignUpController($c->get('view'), $c->get('user_repository'));
        }
    );

    $container->set(
        LandingController::class,
        function (ContainerInterface $c) {
            return new LandingController($c->get('view'));
        }
    );

    $container->set(
        ProfileController::class,
        function (ContainerInterface $c) {
            return new ProfileController($c->get('view'));
        }
    );

    $container->set(
        PasswordController::class,
        function (ContainerInterface $c) {
            return new PasswordController($c->get('view'));
        }
    );

    $container->set(
        WalletController::class,
        function (ContainerInterface $c) {
            return new WalletController($c->get('view'));
        }
    );

    $container->set(
        ExploreController::class,
        function (ContainerInterface $c) {
            return new ExploreController($c->get('view'));
        }
    );

    $container->set(
        PortfolioController::class,
        function (ContainerInterface $c) {
            return new PortfolioController($c->get('view'));
        }
    );

    $container->set(
        MembershipsController::class,
        function (ContainerInterface $c) {
            return new MembershipsController($c->get('view'));
        }
    );

    $container->set(
        BlogsController::class,
        function (ContainerInterface $c) {
            return new BlogsController($c->get('view'));
        }
    );

}
