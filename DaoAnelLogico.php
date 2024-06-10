<?php
class DaoAnelLogico implements iDaoModeCrud {
   
   private $instanciaConexaoPdoAtiva;
   private $tabela;
   
   public function __construct() {
      $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
      $this->tabela = "tb_anellogico";
   }
   /**
   *
   * create: Insere informações no banco de dados
   *
   * @param object $objeto
   * @return boolean
   */
   public function create( $objeto ) {
      $id = $this->getNeWIdAnelLogico();
      $nome = $objeto->getNome();
      $descricao = $objeto->getDescricao();
      $sqlStmt = "INSERT INTO {$this->tabela} (ID, NOME, DESCRICAO) VALUES (:id, :nome, :descricao)";
      try {
         $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
         $operacao->bindValue(":id", $id, PDO::PARAM_INT);
         $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
         $operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
         if($operacao->execute()){
               if($operacao->rowCount() > 0) {
                  $objeto->setID($id);
                  return true;
               } else {
                  return false;
               }
            } else {
               return false;
         }
      } catch( PDOException $excecao ) {
            echo $excecao->getMessage();
      }
   }
   /**
   *
   * read: Retorna um objeto refletindo um contato
   *
   * @param int $id
   * @return object
   */
   public function read( $id ) {
      $sqlStmt = "SELECT * from {$this->tabela} WHERE ID=:id";
      try {
         $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
         $operacao->bindValue(":id", $id, PDO::PARAM_INT);
         $operacao->execute();
         $getRow = $operacao->fetch(PDO::FETCH_OBJ);
         $nome = $getRow->NOME;
         $descricao = $getRow->DESCRICAO;
         $objeto = new AnelLogico( $nome, $descricao );
         $objeto->setId($id);
         return $objeto;
      } catch( PDOException $excecao ){
         echo $excecao->getMessage();
      }
   }
   
   /**
   *
   * update: atualiza um contato
   *
   * @param object $objeto
   * @return boolean
   */
   public function update( $objeto ) {
      $id = $objeto->getId();
      $nome = $objeto->getNome();
      $descricao = $objeto->getDescricao();
      $sqlStmt = "UPDATE {$this->tabela} SET NOME=:nome, DESCRICAO=:descricao WHERE ID=:id";
      try {
         $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
         $operacao->bindValue(":id", $id, PDO::PARAM_INT);
         $operacao->bindValue(":nome", $nome, PDO::PARAM_STR);
         $operacao->bindValue(":descricao", $descricao, PDO::PARAM_STR);
         if($operacao->execute()){
            if($operacao->rowCount() > 0){
               return true;
            } else {
               return false;
            }
         } else {
           return false;
         }
      } catch ( PDOException $excecao ) {
         echo $excecao->getMessage();
      }
   }
   /**
   *
   * DELETE exclui um contato no banco de dados conforme informado por id
   *
   * @param int $id
   * @return boolean
   */
   public function delete( $id ) {
      $sqlStmt = "DELETE FROM {$this->tabela} WHERE ID=:id";
      try {
         $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
         $operacao->bindValue(":id", $id, PDO::PARAM_INT);
         if($operacao->execute()){
            if($operacao->rowCount() > 0) {
                  return true;
            } else {
                  return false;
            }
         } else {
            return false;
         }
      } catch ( PDOException $excecao ) {
         echo $excecao->getMessage();
      }
   }

   public function getIphostAnel($idanel){
		$sqlStmt = "SELECT h.ip FROM tb_host AS h INNER JOIN tb_asso_anellogico_host AS ah ON ah.id_host = h.id WHERE ah.id_anel_logico={$idanel}";
		try {
		   $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
		   if($operacao->execute()){
			
			$resultado = $operacao->fetchAll(PDO::FETCH_OBJ);
			return $resultado;
		   }
		} catch( PDOException $excecao ) {
			  echo $excecao->getMessage();
		}
	}
   
   /**
   *
   * getNewIdContato retorna um novo Id para novos registros
   *
   * @return int
   * @throws Exception
   */
   private function getNewIdAnelLogico(){
         $sqlStmt = "SELECT MAX(ID) AS ID FROM {$this->tabela}";
         try {
            $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
            if($operacao->execute()) {
               if($operacao->rowCount() > 0){
                  $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                  $idReturn = (int) $getRow->ID + 1;
                  return $idReturn;
               } else {
                  throw new Exception("Ocorreu um problema com o banco de dados");
                  exit();
               }
            } else {
               throw new Exception("Ocorreu um problema com o banco de dados");
               exit();
            }
         } catch (PDOException $excecao) {
            echo $excecao->getMessage();
         }
      }
   }
?>