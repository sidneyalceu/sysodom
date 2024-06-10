<?php
/**
 * Description of ifTableClass
 *
 * @author sidney.wanderley
 */
class ifXTableClass {
    
    
    public function walkifName($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfIndex = $session->walk(".1.3.6.1.2.1.31.1.1.1.1", TRUE);
        
        return $listIfIndex;
    }
    
    public function walkifHighSpeed($iphost, $snmpcomunity){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $listIfDescr = $session->walk(".1.3.6.1.2.1.31.1.1.1.15", TRUE);
        
        return $listIfDescr;
    }

    public function getifName($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfAdminStatus = $session->get(".1.3.6.1.2.1.31.1.1.1.1.".$port, TRUE);
        
        return $IfAdminStatus;
    }    

    public function getifAlias($iphost, $snmpcomunity, $port){
        $session = new SNMP(SNMP::VERSION_2C, $iphost, $snmpcomunity);
        $session->valueretrieval = SNMP_VALUE_PLAIN;

        $IfOperStatus = $session->get(".1.3.6.1.2.1.31.1.1.1.18.".$port, TRUE);
        
        return $IfOperStatus;
    }
    
}
