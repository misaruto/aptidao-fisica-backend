<?php

namespace Src\Resources;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Src\Models\Request\RespostaRequestModel;

class RespostaResource
{
  public function criar(Request $request, Response $response, array $args)
  {
    $serializer = new Serializer([], [new JsonEncoder()]);
    $reposta = $serializer->deserialize($request->getBody(), RespostaRequestModel::class, "json");
    var_dump($reposta);

    $retorno["dados"] = array("ok" => true, "message" => "Resposta recebida");
    $retorno["status"] = 200;
    return $response->getBody()->write(json_encode($retorno));
  }
}