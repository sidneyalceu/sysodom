<?php

class AnelLogico {
   
    private $id = null;
    private $nome;
    private $descricao;
    //private $hostname = new ArrayObject();
    
    public function __construct() {

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
    public function getHostname(){
        return $this->hostname;
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
    
    public function Hostname() {
        if( $this->hostname == null ) {
             $this->hostname = new Hostname();
        }
        return $this->hostname;
    }
}
?>