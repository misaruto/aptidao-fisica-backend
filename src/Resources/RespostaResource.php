<?php

namespace AptidaoFisicaBackend\Resources;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use AptidaoFisicaBackend\Models\Dto\RespostaDto;
use AptidaoFisicaBackend\Services\RespostaService;

class RespostaResource
{

  public function criar(Request $request, Response $response, array $args)
  {
    try {
      $reposta_service = new RespostaService();
      $resposta_dto = new RespostaDto();
      $erros = $resposta_dto->mapResposta($request->getBody()->getContents());

      if ($erros) {
        $retorno["ok"] = false;
        $retorno["errors"] = $erros;
        $retorno["status"] = 400;
        $response->withStatus(400)->getBody()->write(json_encode($retorno));
        return $response;
      }

      $retorno = $reposta_service->salvar($resposta_dto);
      $retorno["status"] = 200;
      if ($retorno["error"]) {
        $retorno["status"] = 400;
        $response->withStatus(400)->getBody()->write(json_encode($retorno));
        return $response;
      }

      $response->getBody()->write(json_encode($retorno));
      return $response;

    } catch (\Exception $e) {
      $retorno["ok"] = false;
      $retorno["errors"] = $e;
      $retorno["status"] = 400;
      $response->withStatus(400)->getBody()->write(json_encode($retorno));
      return $response;
    }
  }

  public function getByCdParticipante(Request $request, Response $response, array $args)
  {

    try {
      $reposta_service = new RespostaService();
      $cd_participante = $args["cd_participante"];
      $retorno = $reposta_service->getByCdParticipante($cd_participante);
      $retorno["status"] = 200;

      $response->getBody()->write(json_encode($retorno));
      return $response;

    } catch (\Exception $e) {
      $retorno["ok"] = false;
      $retorno["errors"] = $e;
      $retorno["status"] = 400;
      $response->withStatus(400)->getBody()->write(json_encode($retorno));
      return $response;
    }
  }
}