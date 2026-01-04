<?php

	// include("class.conexao.php");
	// $conexao = new Conexao();
	// $conexao->conecta();
//  define('HOST', 'sql220.main-hosting.eu');
//  define('DBNAME', 'u745336311_lazer');
//  define('CHARSET', 'utf8');
//  define('USER', 'u745336311_fhume');
//  define('PASSWORD', '');
  define('HOST', 'localhost');
  define('DBNAME', 'imoveis');
  define('CHARSET', 'utf8');
  define('USER', 'root');
  define('PASSWORD', '');



class Conexao {

   /*
   * Atributo estático para instância do PDO
   */
   private static $pdo;

   /*
   * Escondendo o construtor da classe
   */
   private function __construct() {
    //
   }

   /*
   * Método estático para retornar uma conexão válida
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão
   */
   public static function getInstance() {
    if (!isset(self::$pdo)) {
     try {
      $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
      // gera erro de WARNING: PDO::__CONSTRUCT(): MYSQL SERVER HAS GONE AWAY as $opcoes
      // self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
      self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     } catch (PDOException $e) {
      print "Erro: " . $e->getMessage();
     }
    }
    return self::$pdo;
   }
  }
