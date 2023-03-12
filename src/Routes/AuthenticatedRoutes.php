<?php
namespace Src\Routes;

use Slim\App;
use Src\Resources\RespostaResource;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthenticatedRoutes
{
  function __construct(App $app)
  {
    $app->post("/resposta", RespostaResource::class . ':criar');
    $app->get("/", function (Request $request, Response $response, array $args): Response {
      $retorno["dados"] = array("ok" => true, "message" => "Resposta recebida");
      $retorno["status"] = 200;

      $response->getBody()->write(json_encode($retorno));
      return $response;
    });
  }
}