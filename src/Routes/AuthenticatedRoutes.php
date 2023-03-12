<?php
namespace AptidaoFisicaBackend\Routes;

use Slim\App;
use AptidaoFisicaBackend\Resources\RespostaResource;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthenticatedRoutes
{
  function __construct(App $app)
  {
    $app->post("/resposta", RespostaResource::class . ':criar');
    $app->get("/resposta/{cd_participante}", RespostaResource::class . ':getByCdParticipante');
  }
}