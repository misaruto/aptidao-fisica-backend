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
      $dados = $repository->getByCdParticipante($cd_participante);
      $retorno["ok"] = true;
      $retorno["dados"] = $dados;
      $retorno["message"] = sizeof($dados) > 0 ? "Consulta realizada com sucesso." : "Consulta realizada com sucesso, porém não retornou nenhum dado.";
      return $retorno;
    } catch (\Exception $e) {
      $retorno["ok"] = false;
      $retorno["error"] = $e->getMessage();
      return $retorno;
    }
  }
}