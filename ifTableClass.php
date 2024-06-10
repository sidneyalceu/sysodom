<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ifTableClass
 *
 * @author sidney.wanderley
 */
class ifTableClass {
    
    
    public function walkifIndex($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfIndex = $session->walk(".1.3.6.1.2.1.2.2.1.1", TRUE);
        
        return $listIfIndex;
    }
    
    public function walkifDescr($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfDescr = $session->walk(".1.3.6.1.2.1.2.2.1.2", TRUE);
        
        return $listIfDescr;
    }
    
    public function walkifType($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfType = $session->walk(".1.3.6.1.2.1.2.2.1.3", TRUE);
        
        return $listIfType;
    }

    public function walkifMtu($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfMtu = $session->walk(".1.3.6.1.2.1.2.2.1.4", TRUE);
        
        return $listIfMtu;
    }

    public function walkifSpeed($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfSpeed = $session->walk(".1.3.6.1.2.1.2.2.1.5", TRUE);
        
        return $listIfSpeed;
    }    

    public function walkifAdminStatus($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfAdminStatus = $session->walk(".1.3.6.1.2.1.2.2.1.7", TRUE);
        
        return $listIfAdminStatus;
    }    

    public function walkifOperStatus($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOperStatus = $session->walk(".1.3.6.1.2.1.2.2.1.8", TRUE);
        
        return $listIfOperStatus;
    }
    
    public function walkifLastChange($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfLastchange = $session->walk(".1.3.6.1.2.1.2.2.1.9", TRUE);
        
        return $listIfLastchange;
    }
    
    public function walkifInOctets($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInOctets = $session->walk(".1.3.6.1.2.1.2.2.1.10", TRUE);
        
        return $listIfInOctets;
    }
    
    public function walkifInDiscards($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInDiscards = $session->walk(".1.3.6.1.2.1.2.2.1.13", TRUE);
        
        return $listIfInDiscards;
    }
    
    public function walkifInErrors($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInErrors = $session->walk(".1.3.6.1.2.1.2.2.1.14", TRUE);
        
        return $listIfInErrors;
    }

    public function walkifOutOctets($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutOctets = $session->walk(".1.3.6.1.2.1.2.2.1.16", TRUE);
        
        return $listIfOutOctets;
    }
    
    public function walkifOutDiscards($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutDiscards = $session->walk(".1.3.6.1.2.1.2.2.1.19", TRUE);
        
        return $listIfOutDiscards;
    }
    
    public function walkifOutErrors($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutErrors = $session->walk(".1.3.6.1.2.1.2.2.1.20", TRUE);
        
        return $listIfOutErrors;
    }
    
    
    public function getifIndex($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfIndex = $session->get(".1.3.6.1.2.1.2.2.1.1.".$port, TRUE);
        
        return $IfIndex;
    }
    
    public function getifDescr($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfDescr = $session->get(".1.3.6.1.2.1.2.2.1.2.".$port, TRUE);
        
        return $IfDescr;
    }
    
    public function getifType($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfType = $session->get(".1.3.6.1.2.1.2.2.1.3.".$port, TRUE);
        
        return $IfType;
    }

    public function getifMtu($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfMtu = $session->get(".1.3.6.1.2.1.2.2.1.4.".$port, TRUE);
        
        return $IfMtu;
    }

    public function getifSpeed($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfSpeed = $session->get(".1.3.6.1.2.1.2.2.1.5.".$port, TRUE);
        
        return $IfSpeed;
    }    

    public function getifAdminStatus($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfAdminStatus = $session->get(".1.3.6.1.2.1.2.2.1.7.".$port, TRUE);
        
        return $IfAdminStatus;
    }    

    public function getifOperStatus($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfOperStatus = $session->get(".1.3.6.1.2.1.2.2.1.8.".$port, TRUE);
        
        return $IfOperStatus;
    }
    
    public function getifLastChange($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfLastchange = $session->get(".1.3.6.1.2.1.2.2.1.9", TRUE);
        
        return $listIfLastchange;
    }
    
    public function getifInOctets($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInOctets = $session->get(".1.3.6.1.2.1.2.2.1.10", TRUE);
        
        return $listIfInOctets;
    }
    
    public function getifInDiscards($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInDiscards = $session->get(".1.3.6.1.2.1.2.2.1.13", TRUE);
        
        return $listIfInDiscards;
    }
    
    public function getifInErrors($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfInErrors = $session->get(".1.3.6.1.2.1.2.2.1.14", TRUE);
        
        return $listIfInErrors;
    }

    public function getifOutOctets($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutOctets = $session->get(".1.3.6.1.2.1.2.2.1.16", TRUE);
        
        return $listIfOutOctets;
    }
    
    public function getifOutDiscards($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutDiscards = $session->get(".1.3.6.1.2.1.2.2.1.19", TRUE);
        
        return $listIfOutDiscards;
    }
    
    public function getifOutErrors($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfOutErrors = $session->get(".1.3.6.1.2.1.2.2.1.20", TRUE);
        
        return $listIfOutErrors;
    }
}
