<?php
namespace AptidaoFisicaBackend\Services;

use AptidaoFisicaBackend\Models\Dto\RespostaDto;

use AptidaoFisicaBackend\Repository\RespostaRepository;

class RespostaService
{

  public function salvar(RespostaDto $resposta)
  {
    try {

      $repository = new RespostaRepository();
      $repository->salvar($resposta);
      $retorno["ok"] = true;
      $retorno["dados"] = $resposta->serializeResposta();
      $retorno["message"] = "Resposta salva com sucesso";
      return $retorno;
    } catch (\Exception $e) {
      $retorno["ok"] = false;
      $retorno["error"] = $e->getMessage();
      return $retorno;
    }
  }

  public function getByCdParticipante(string $cd_participante)
  {
    try {
      $repository = new RespostaRepository();
      $retorno["ok"] = true;
      $retorno["dados"] = $repository->getByCdParticipante($cd_participante);
      $retorno["message"] = "Resposta salva com sucesso";
      return $retorno;
    } catch (\Exception $e) {
      $retorno["ok"] = false;
      $retorno["error"] = $e->getMessage();
      return $retorno;
    }
  }
}