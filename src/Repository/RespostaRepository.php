<?php
namespace AptidaoFisicaBackend\Repository;

use AptidaoFisicaBackend\Models\Dto\RespostaDto;
use AptidaoFisicaBackend\Database\Connection;

class RespostaRepository
{
  public function salvar(RespostaDto $resposta)
  {
    $pdo = new Connection();
    $pdo = $pdo->getConnection();
    $stmt = $pdo->prepare("
      INSERT INTO resposta(
        cd_pergunta,
        cd_participante,
        cd_grupo,
        cd_coleta,
        nm_resposta,
        tx_resposta,
        nm_usario
      ) 
      VALUES (
        :cd_pergunta,
        :cd_participante,
        :cd_grupo,
        :cd_coleta,
        :nm_resposta,
        :tx_resposta,
        :nm_usario
      )
    ");
    $stmt->bindValue("cd_pergunta", $resposta->getCdPergunta());
    $stmt->bindValue("cd_participante", $resposta->getCdParticipante());
    $stmt->bindValue("cd_grupo", $resposta->getCdGrupo());
    $stmt->bindValue("cd_coleta", $resposta->getCdColeta());
    $stmt->bindValue("nm_resposta", $resposta->getNmResposta());
    $stmt->bindValue("tx_resposta", $resposta->getTxResposta());
    $stmt->bindValue("nm_usario", "USER()");
    try {
      $pdo->beginTransaction();
      $stmt->execute();
      $pdo->commit();
    } catch (\PDOException $e) {
      $pdo->rollBack();
      throw new \Exception("Erro ao realizar a query. " . $e->getMessage());
    }
  }

  public function getByCdParticipante(string $cd_participante): array
  {
    $pdo = new Connection();
    $pdo = $pdo->getConnection();

    $stmt = $pdo->prepare("
      SELECT 
        * 
      FROM resposta
      WHERE cd_participante = :cd_participante
    ");

    $stmt->bindValue("cd_participante", $cd_participante);

    try {
      $stmt->execute();
      $retorno = [];

      while ($row = $stmt->fetch()) {
        $resp = new RespostaDto();
        $resp->mapRespostaBd($row);
        $retorno[] = $resp->serializeResposta();
      }
      return $retorno;
    } catch (\PDOException $e) {
      $pdo->rollBack();
      throw new \Exception("Erro ao realizar a query. " . $e->getMessage());
    }

  }
}