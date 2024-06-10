<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of extemeVlanClass
 *
 * @author sidney.wanderley
 */
class extemeVlanClass {
    //put your code here
    
    public function walkVlanIfIndex($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listVlanIfIndex = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.1", TRUE);
        
        return $listVlanIfIndex;
    }

    public function getVlanIfIndex($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfIndex = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.1.".$port, TRUE);
        
        return $VlanIfIndex;
    }
    
    public function getVlanIfDesc($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfDesc = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.2.".$port, TRUE);
        
        return $VlanIfDesc;
    }
    
    public function getVlanIfType($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfType = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.3.".$port, TRUE);
        
        return $VlanIfType;
    }
    
    public function getVlanIfAdminStatus($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfAdminStatus = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.12.".$port, TRUE);
        
        return $VlanIfAdminStatus;
    }
    
    public function getVlanIfEncapsType($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfEncapsType = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.11.".$port, TRUE);
        
        return $VlanIfEncapsType;
    }
    
    public function getVlanIfVlanId($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $VlanIfVlanId = $session->get(".1.3.6.1.4.1.1916.1.2.1.2.1.10.".$port, TRUE);
        
        return $VlanIfVlanId;
    }

}