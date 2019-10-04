<?php
namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{
   private const HOST = "localhost";
   private const USER = "root";
   private const DBNAME= "bd_momento_doe";
  //  private const PASSWD = "12345678";
   private const PASSWD = "";

// Configurações importantes

private const OPTIONS = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // charset do PDO  o mesmo do banco de dados
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // sempre que houver erros teremos uma exceção
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // converter qualquer resultado em objeto anônimo
    PDO::ATTR_CASE => PDO::CASE_NATURAL, // considera a forma como foi escrito as colunas na tabela
    // temos também: CASE_LOWER e CASE_UPPER
    PDO :: ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];

// Padrão Singleton
// 1º passo
private static $instance;  // quem vai armazenar o objeto PDO. Sempre um objeto por usuário

// 2º passo __construct | __clone -> Se queremos apenas uma intância por usuário, 
// não podemos permitir a criação de novas instâncias e nem o clone (cópia)

final private function __construct()
{

}

final private function __clone()
{

}

// self se refere à classe. Acesso a membros estáticos da classe

public static function getInstance():PDO
{
  if(empty(self::$instance)){
     try{
          self::$instance =  new \PDO(
              "mysql:host=".self::HOST . ";dbname=". self::DBNAME,
              self::USER,
              self::PASSWD,
              self:: OPTIONS
          );
     }catch(PDOException $exception){
       die("<h1>Erro ao conectar...</h1>"); // trava o código
     }
  }

  return self::$instance;
}
}
