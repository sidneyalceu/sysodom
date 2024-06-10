<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anel
 *
 * @author Sidney
 */
class Anel {
    //put your code here
    public $nomeanel;
    public $descricaoanel;
    public $vlancontroelanel;
    public $switchmasteranel;
    
    public function __construct($nomeanel, $descricaoanel, $vlancontroelanel, $switchmasteranel) {
        $this->nomeanel = $nomeanel;
        $this->descricaoanel = $descricaoanel;
        $this->vlancontroelanel = $vlancontroelanel;
        $this->switchmasteranel = $switchmasteranel;
    }

    public function getNomeanel() {
        return $this->nomeanel;
    }

    public function getDescricaoanel() {
        return $this->descricaoanel;
    }

    public function getVlancontroelanel() {
        return $this->vlancontroelanel;
    }

    public function getSwitchmasteranel() {
        return $this->switchmasteranel;
    }

    public function setNomeanel($nomeanel): void {
        $this->nomeanel = $nomeanel;
    }

    public function setDescricaoanel($descricaoanel): void {
        $this->descricaoanel = $descricaoanel;
    }

    public function setVlancontroelanel($vlancontroelanel): void {
        $this->vlancontroelanel = $vlancontroelanel;
    }

    public function setSwitchmasteranel($switchmasteranel): void {
        $this->switchmasteranel = $switchmasteranel;
    }



    
}
