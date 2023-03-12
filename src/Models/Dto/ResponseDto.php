<?php
namespace AptidaoFisicaBackend\Models\Dto;

class ResponseDto
{
  public bool $ok;
  public mixed $dados;
  public mixed $erros;
  public string $message;

  public function mapSeparado($ok, $dados, $erros, $message)
  {
    $this->ok = $ok;
    $this->dados = $dados;
    $this->erros = $erros;
    $this->message = $message;
  }
  public function mapArray($array)
  {
    $this->ok = $array->ok;
    $this->dados = $array->dados;
    $this->erros = $array->erros;
    $this->message = $array->message;
  }
}