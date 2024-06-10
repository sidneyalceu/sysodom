<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigAnel
 *
 * @author Sidney
 */
class ConfigAnel {
    //put your code here
    public $nomeanel;
    public $descricaoanel;
    public $vlancontrole;
    public $portaanelprimaria;
    public $portaanelsecondaria;
    
    public function __construct($nomeanel, $descricaoanel, $vlancontrole, $portaanelprimaria, $portaanelsecondaria) {
        $this->nomeanel = $nomeanel;
        $this->descricaoanel = $descricaoanel;
        $this->vlancontrole = $vlancontrole;
        $this->portaanelprimaria = $portaanelprimaria;
        $this->portaanelsecondaria = $portaanelsecondaria;
    }
    
    public function getNomeanel() {
        return $this->nomeanel;
    }

    public function getDescricaoanel() {
        return $this->descricaoanel;
    }

    public function getVlancontrole() {
        return $this->vlancontrole;
    }

    public function getPortaanelprimaria() {
        return $this->portaanelprimaria;
    }

    public function getPortaanelsecondaria() {
        return $this->portaanelsecondaria;
    }

    public function setNomeanel($nomeanel): void {
        $this->nomeanel = $nomeanel;
    }

    public function setDescricaoanel($descricaoanel): void {
        $this->descricaoanel = $descricaoanel;
    }

    public function setVlancontrole($vlancontrole): void {
        $this->vlancontrole = $vlancontrole;
    }

    public function setPortaanelprimaria($portaanelprimaria): void {
        $this->portaanelprimaria = $portaanelprimaria;
    }

    public function setPortaanelsecondaria($portaanelsecondaria): void {
        $this->portaanelsecondaria = $portaanelsecondaria;
    }
    
    public function createConfigeXOS() {
        $createanel = "create eaps ".$this->getNomeanel()."<BR>".
                      "configure vlan ".$this->getNomeanel()." add ports ".$portasconfig."<BR>".
                      "configure ".$this->getNomeanel()." "." primary port ".$this->getPortaanelprimaria()."<BR>".
                      "configure ".$this->getNomeanel()." "." secondary port ".$this->getPortaanelsecondaria()."<BR>".
                      "configure ".$this->getNomeanel()." add control vlan ".$this->getVlancontrole()."<BR>";
        
        return $createanel;
    }
                
}
