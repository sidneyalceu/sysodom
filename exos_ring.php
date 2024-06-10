<?php
# esse script lista as vlan do switch contidas no eaps.

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

$ip_do_host = $argv[1];
echo "$ip_do_host\n";

$session = new SNMP(SNMP::VERSION_2c, $ip_do_host, "public");
$session->valueretrieval = SNMP_VALUE_PLAIN;

$extremeEapsName = $session->walk(".1.3.6.1.4.1.1916.1.18.1.1.1", TRUE);

$OID_extremeEapsMbrVlanName = ".1.3.6.1.4.1.1916.1.18.4.1.1";

$MySQLi = new MySQLi("127.0.0.1","sidney","indiglo", "db_network");

foreach($extremeEapsName as $EapsName) {
    echo "\n".$EapsName;
    $OID_extremeEapsMbrVlanName = $OID_extremeEapsMbrVlanName.".".strlen($EapsName);
    for ($Pinicial=0; $Pinicial<strlen($EapsName); $Pinicial++){
        $OID_extremeEapsMbrVlanName = $OID_extremeEapsMbrVlanName.".".ord($EapsName[$Pinicial]);
    }
    //echo "\n".$OID_extremeEapsMbrVlanName;
    echo "\n";
    
    $extremeEapsMbrVlanName = $session->walk($OID_extremeEapsMbrVlanName, TRUE,1);
    foreach($extremeEapsMbrVlanName as $EapsMbrVlanName) {
        echo "---> ".$EapsMbrVlanName."\n";
        $query = "INSERT INTO tb_host_eaps_ring_vlan (iphost,nome_eaps,nome_vlan) VALUES ('$ip_do_host','$EapsName','$EapsMbrVlanName')";
        echo $query."\n";
        $result = $MySQLi->query($query);
    }
    sleep(1);
    $OID_extremeEapsMbrVlanName = ".1.3.6.1.4.1.1916.1.18.4.1.1";
}