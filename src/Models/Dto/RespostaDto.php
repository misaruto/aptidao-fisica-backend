<?php

namespace AptidaoFisicaBackend\Models\Dto;

/*
 */
class RespostaDto
{
  /**
   * @obrigatorio
   */
  private string $cdPergunta = "";
  /**
   * @obrigatorio
   */
  private string $cdParticipante = "";
  /**
   * @obrigatorio
   */
  private string $cdGrupo = "";
  /**
   * @obrigatorio
   */
  private string $cdColeta = "";
  /**
   * @obrigatorio
   */
  private string $nmResposta = "";
  /**
   * @obrigatorio
   */
  private string $txResposta = "";
  /**
   */
  private $nmUsuario = "";



  public function mapResposta(mixed $resp): array
  {
    $erros = [];
    if (gettype($resp) === "string") {
      $data = json_decode($resp, true);
    } else {
      $data = json_decode(json_encode($resp), true);
    }
    $obj = new \ReflectionObject($this);

    foreach ($this as $key => $value) {
      $v = $data[$key];
      if ($v === null && strpos($obj->getProperty($key)->getDocComment(), "@obrigatorio") != false) {
        $erros[$key] = "Campo obrigatório";
        continue;
      }
      $this->{$key} = $v;
    }

    return $erros;
  }


  public function mapRespostaBd(mixed $resp)
  {
    $this->cdPergunta = $resp->cd_pergunta;
    $this->cdParticipante = $resp->cd_participante;
    $this->cdGrupo = $resp->cd_grupo;
    $this->cdColeta = $resp->cd_coleta;
    $this->nmResposta = $resp->nm_resposta;
    $this->txResposta = $resp->tx_resposta;
  }

  public function serializeResposta(): array
  {
    foreach ($this as $key => $value) {

      $retorno[$key] = $value;
    }
    return $retorno;
  }
  public function getCdPergunta(): string
  {
    return $this->cdPergunta;
  }
  public function getCdParticipante(): string
  {
    return $this->cdParticipante;
  }
  public function getCdGrupo(): string
  {
    return $this->cdGrupo;
  }
  public function getCdColeta(): string
  {
    return $this->cdColeta;
  }
  public function getNmResposta(): string
  {
    return $this->nmResposta;
  }
  public function getTxResposta(): string
  {
    return $this->txResposta;
  }


  public function setCdPergunta(string $cdPergunta): void
  {
    $this->cdPergunta = $cdPergunta;
  }
  public function setCdParticipante(string $cdParticipante): void
  {
    $this->cdParticipante = $cdParticipante;
  }
  public function setCdGrupo(string $cdGrupo): void
  {
    $this->cdGrupo = $cdGrupo;
  }
  public function setCdColeta(string $cdColeta): void
  {
    $this->cdColeta = $cdColeta;
  }
  public function setNmResposta(string $nmResposta): void
  {
    $this->nmResposta = $nmResposta;
  }
  public function setTxResposta(string $txResposta): void
  {
    $this->txResposta = $txResposta;
  }
}