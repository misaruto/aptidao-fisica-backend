<?php

namespace Src\Models\Request;

class RespostaRequestModel
{
  private string $cdPergunta;
  private string $cdParticipante;
  private string $cdGrupo;
  private string $cdColeta;
  private string $nmResposta;
  private string $txResposta;

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