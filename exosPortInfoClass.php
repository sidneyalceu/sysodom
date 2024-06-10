<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of exosPortInfoClass
 *
 * @author sidney.wanderley
 */
class exosPortInfoClass {
    public $qtd_porta;
    
    
    public function quantidadePorta() {
        $session = new SNMP(SNMP::VERSION_1, "10.7.0.1", "publicaloo");
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $extremeIfindexType = $session->walk(".1.3.6.1.2.1.2.2.1.3", TRUE);
        $extremeIfindexAlias = $session->walk(".1.3.6.1.2.1.31.1.1.1.18", TRUE);

        $cont = 0;

        foreach($extremeIfindexType as $Type) {
            if ($Type == "6") {
		$cont++;
            }   
        }

        foreach($extremeIfindexAlias as $Alias) {
            if ($Alias == "MgmtPort") {
            	$cont--;
            }
        }
        return $cont;
    }
    
    public function ifMtu() {
        $session = new SNMP(SNMP::VERSION_1, "10.7.0.1", "publicaloo");
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $extremeIfMtu = $session->walk(".1.3.6.1.2.1.2.2.1.4", TRUE);
        
        $cont = 0;

        foreach($extremeIfindexType as $Type) {
            if ($Type == "6") {
		$cont++;
            }   
        }

        foreach($extremeIfindexAlias as $Alias) {
            if ($Alias == "MgmtPort") {
            	$cont--;
            }
        }
        return $cont;
    }
}
