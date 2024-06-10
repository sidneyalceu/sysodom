<?php
class DaoInfraBackBone {
    private $instanciaConexaoPdoAtiva;
    private $tabela;
   
    public function __construct() {
      $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
      $this->tabela = "tb_infrabackbone";
    }
   /**
   *
   * create: Insere informações no banco de dados
   *
   * @param object $objeto
   * @return boolean
   */
    public function create( $objeto ) {
        $id = $this->getNeWIdAnelFisico();
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
}
?>