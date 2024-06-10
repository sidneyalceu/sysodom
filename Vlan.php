<?php
class Vlan {
    private $id = null;
    private $nome;
    private $descricao;
    private $tag;
    public function __construct($nome, $descricao, $tag) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->tag = $tag;
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
    public function getTag(){
        return $this->tag;
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
    public function setTag($tag) {
        $this->tag = $tag;
    }
}
?>