<?php
use Slim\App;
use Slim\Factory\AppFactory;

use AptidaoFisicaBackend\Routes\AuthenticatedRoutes;

return function (): App {
  $app = AppFactory::create();

  new AuthenticatedRoutes($app);


  return $app;
};