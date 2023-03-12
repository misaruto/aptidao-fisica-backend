<?php
namespace AptidaoFisicaBackend\Database;

use \PDO;

class Connection
{
  private PDO $connection;

  private $host = '127.0.0.1';
  private $db = 'aptidao_fisica';
  private $user = 'root';
  private $pass = '';
  private $charset = 'utf8';
  private $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];
  private $iniciada = false;

  public function __construct()
  {
    self::conectar();
  }
  private function conectar(): PDO
  {
    try {
      $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
      $this->connection = new PDO($dsn, $this->user, $this->pass, $this->options);
      $this->iniciada = true;

      return $this->connection;
    } catch (\PDOException $e) {
      $this->iniciada = false;
      throw new \Exception("Erro ao estabelecer conexão com a base. " . $e->getMessage());
    }
  }

  public function getConnection(): PDO
  {

    if ($this->iniciada) {
      return $this->connection;
    }
    return $this->conectar();
  }
}