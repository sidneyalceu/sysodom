<?php

class Endereco {
    private $logradouro;
    private $bairro;
    private $cidade;
    private $numero;
    private $complemento;
    private $geolocalizacao;

    public function getLogradouro() {
        return $this->logradouro;
    }
    public function getBairro() {
        return $this->bairro;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function getNumero() {
        return $this->numero;
    }
    public function getComplemento() {
        return $this->complemento;
    }
    public function getGeolocalizacao() {
        return $this->geolocalizacao;
    }



}