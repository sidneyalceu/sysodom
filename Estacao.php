<?php
class Estacao {
    private $id = null;
    private $codigo;
    private $sigla;
    private $nome;
    private $descricao;
    private $endereco;

    public function __construct($codigo,$sigla,$nome, $descricao) {
        $this->codigo = $codigo;
        $this->sigla = $sigla;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }
    public function getId() {
        return $this->id;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getSigla(){
        return $this->sigla;
    }
    public function getNome() {
       return $this->nome;
    }
    public function getDescricao() {
       return $this->descricao;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setSigla($sigla){
        $this->sigla = $sigla;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setEndereco($endereco){
        $this->endereco = new Endereco();
    }
}
?>