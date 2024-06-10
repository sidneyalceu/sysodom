<?php
class Pontoaponto {
    private $id = null;
    private $nome;
    private $descricao;
    private $pontaA;
    private $pontaB;
    public function __construct($nome, $descricao, $pontaA, $pontaB) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->pontaA = $pontaA;
        $this->pontaB = $pontaB;
    }
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getPontaA(){
        return $this->pontaA;
    }
    public function getPontaB(){
        return $this->pontaB;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setPontaA($pontaA) {
        $this->pontaA = $pontaA;
    }
    public function setPontaB($pontaB){
        $this->pontaB = $pontaB;
    }
}
?>