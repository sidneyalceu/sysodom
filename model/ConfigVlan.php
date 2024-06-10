<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigVlan
 *
 * @author Sidney
 */
class ConfigVlan {
    //put your code here
    public $nomevlan;
    public $tagvlan;
    public $tagged;
    public $portasdavlan = array();
    
    public function __construct($nomevlan, $tagvlan, $portasdavlan) {
        $this->nomevlan = $nomevlan;
        $this->tagvlan = $tagvlan;
        $this->portasdavlan = $portasdavlan;
    }

    public function getNomevlan() {
        return $this->nomevlan;
    }

    public function getTagged() {
        return $this->tagged;
    }
    
    public function getTagvlan() {
        return $this->tagvlan;
    }

    public function getPortasdavlan() {
        return $this->portasdavlan;
    }

    public function setNomevlan($nomevlan): void {
        $this->nomevlan = $nomevlan;
    }

    public function setTagged($tagged): void {
        $this->tagged = $tagged;
    }
    public function setTagvlan($tagvlan): void {
        $this->tagvlan = $tagvlan;
    }

    public function setPortasdavlan($portasdavlan): void {
        $this->portasdavlan = $portasdavlan;
    }
    
    public function getPortas(){
        
    }
    
    public function createConfigeXOS() {
        foreach ($portas = $getPortasdavlan() as $porta){
            $portasconfig = $porta." ".$portasconfig;
        }
        $createvlan = "create vlan ".getNomevlan()." ". $this->getTagvlan();
        $conifgportavlan = "configure vlan ".getNomevlan()." add ports ".$portasconfig;
        
        return $createvlan."<BR>".$configportavlan;
    }

    
}
