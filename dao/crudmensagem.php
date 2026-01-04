<?php 

	session_start();
	
/*  
 * Classe para opera��es CRUD na tabela ARTIGO   
 */
class crudmensagem{  
 
  /*  
   * Atributo para conex�o com o banco de dados   
   */  
  private $pdo = null;  
 
  /*  
   * Atributo est�tico para inst�ncia da pr�pria classe    
   */  
  private static $crudmensagem = null; 
 
  /*  
   * Construtor da classe como private  
   * @param $conexao - Conex�o com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }  
  
  /*
  * M�todo est�tico para retornar um objeto crudmensagem    
  * Verifica se j� existe uma inst�ncia desse objeto, caso n�o, inst�ncia um novo    
  * @param $conexao - Conex�o com o banco de dados   
  * @return $crudmensagem - Instancia do objeto crudmensagem    
  */   
  public static function getInstance($conexao){   
   if (!isset(self::$crudmensagem)):    
    self::$crudmensagem = new crudmensagem($conexao);   
   endif;   
   return self::$crudmensagem;    
  } 
 
 
   //FUN��O CONSULTA MENSAGEMS
   
  public function mensagens(){   
   try{   
	$email_status = 'prendente';
   
    $sql = "SELECT * FROM MENSAGEM ORDER BY DATA"; 
	$stm = $this->pdo->prepare($sql); 
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
	
    return $dados;     
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }



    public function mensagemvisualizar($idmensagem_visualizar){   
   try{   
	
   
    $sql = "SELECT * FROM MENSAGEM WHERE IDMENSAGEM=? ORDER BY DATA"; 
	$stm = $this->pdo->prepare($sql); 
	$stm->bindValue(1, $idmensagem_visualizar);	
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
	
    return $dados;     
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }
  
  
    //FUN��O ATUALIZA MENSAGEM
 
  public function mensagematualizar($idmensagem_visualizar){   
  // if (!empty($descricao) && !empty($id) ):   
  
	$status = 'visto';
    try{   
      $sql = "UPDATE MENSAGEM SET STATUS=? WHERE IDMENSAGEM=?";   
	 
      $stm = $this->pdo->prepare($sql);   
	  $stm->bindValue(1, $status);
	  $stm->bindValue(2, $idmensagem_visualizar);

     $stm->execute();   
	 

    
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";   
    }   
  // endif;   
  }  
  
  
  

   
          //FUN��O INSERE Mensagem
    public function mensagemincluir($nome, $telefone, $email, $mensagem){   
   try{   
	 $status='';
	 $sql = "INSERT INTO MENSAGEM (NOME, TELEFONE, EMAIL, MENSAGEM, STATUS) VALUES (?, ?, ?, ?, ?)";   
     $stm = $this->pdo->prepare($sql);   
	 $stm->bindValue(1, $nome);
	 $stm->bindValue(2, $telefone);
	 $stm->bindValue(3, $email);
	 $stm->bindValue(4, $mensagem);
	 $stm->bindValue(5, $status);
     $stm->execute(); 
	 echo "<script>alert('mensagem enviada com sucesso')</script>"; 

    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }
   
   
   
  
}


  
  
  
  
   