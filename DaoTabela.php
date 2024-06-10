<?php
class DaoTabela {
   
   private $instanciaConexaoPdoAtiva;
   private $tabela;

   public function __construct($tabela) {
      $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
      $this->tabela = $tabela;
   }
   
   public function showSelect() {
      
      try {
         $sqlStmt = "SELECT * FROM {$this->tabela}";
         $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
         $operacao->execute();
         $resultado = $operacao->fetchAll(PDO::FETCH_OBJ);
         return $resultado;
           
      } catch (PDOException $excecao) {
         echo $excecao->getMessage();
      }
   }

   public function getTabela(){
      return $this->tabela;
   }

}
?>