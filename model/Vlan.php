<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vlan
 *
 * @author Sidney
 */
class Vlan {
    //put your code here
    public $nomevlan;
    public $tagvlan;
    public $descricaovlan;
    public $tagged;
    
    public function __construct($nomevlan, $tagvlan, $descricaovlan, $tagged) {
        $this->nomevlan = $nomevlan;
        $this->tagvlan = $tagvlan;
        $this->descricaovlan = $descricaovlan;
        $this->tagged = $tagged;
    }
    
    public function getNomevlan() {
        return $this->nomevlan;
    }

    public function getTagvlan() {
        return $this->tagvlan;
    }

    public function getDescricaovlan() {
        return $this->descricaovlan;
    }

    public function getTagged() {
        return $this->tagged;
    }

    public function setNomevlan($nomevlan): void {
        $this->nomevlan = $nomevlan;
    }

    public function setTagvlan($tagvlan): void {
        $this->tagvlan = $tagvlan;
    }

    public function setDescricaovlan($descricaovlan): void {
        $this->descricaovlan = $descricaovlan;
    }

    public function setTagged($tagged): void {
        $this->tagged = $tagged;
    }


    
    
}
