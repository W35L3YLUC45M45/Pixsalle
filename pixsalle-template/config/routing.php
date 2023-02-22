<?php

declare(strict_types=1);

use Salle\PixSalle\Controller\API\BlogAPIController;
use Salle\PixSalle\Controller\SignUpController;
use Salle\PixSalle\Controller\LandingController;
use Salle\PixSalle\Controller\ProfileController;
use Salle\PixSalle\Controller\PasswordController;
use Salle\PixSalle\Controller\WalletController;
use Salle\PixSalle\Controller\MembershipsController;
use Salle\PixSalle\Controller\ExploreController;
use Salle\PixSalle\Controller\PortfolioController;
use Salle\PixSalle\Controller\BlogsController;
use Salle\PixSalle\Controller\UserSessionController;

use Slim\App;

function addRoutes(App $app): void
{
    $app->get('/', LandingController::class . ':renderLandingPage')->setName('landing');
    $app->get('/sign-in', UserSessionController::class . ':showSignInForm')->setName('signIn');
    $app->post('/sign-in', UserSessionController::class . ':signIn');
    $app->get('/sign-up', SignUpController::class . ':showSignUpForm')->setName('signUp');
    $app->post('/sign-up', SignUpController::class . ':signUp');
    $app->get('/profile', ProfileController::class . ':renderProfilePage')->setName('profile');
    $app->post('/profile', ProfileController::class . ':');
    $app->get('/profile/changePassword', PasswordController::class . ':renderPasswordPage')->setName('profile/changePassword');
    $app->post('/profile/changePassword', PasswordController::class . ':');
    $app->get('/user/wallet', WalletController::class . ':renderWalletPage')->setName('user/wallet');
    $app->post('/user/wallet', WalletController::class . ':')->setName('wallet');
    $app->get('/user/membership', MembershipsController::class . ':renderMembershipPage')->setName('user/membership');
    $app->post('/user/membership', MembershipsController::class . ':');
    $app->get('/portfolio', PortfolioController::class . ':')->setName('portfolio');
    $app->get('/explore', ExploreController::class . ':renderExplorePage')->setName('explore');
    $app->get('/api/blog', BlogsController::class . ':')->setName('blog');
    $app->post('/api/blog', BlogsController::class . ':');
    $app->get('/api/blog/{id}', BlogsController::class . ':')->setName('blogId');
    $app->put('/api/blog/{id}', BlogsController::class . ':');
    $app->delete('/api/blog/{id}', BlogsController::class . ':');
}
