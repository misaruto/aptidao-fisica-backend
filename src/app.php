<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\App;
use Slim\Factory\AppFactory;

use Src\Routes\AuthenticatedRoutes;

return function (): App {
  $app = AppFactory::create();

  new AuthenticatedRoutes($app);


  return $app;
};