<?php
/*
$idring = $_GET["idring"];

$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");
$query = "(select * from tb_host_ring  join tb_ring on tb_host_ring.id_ring = tb_ring.id join tb_hosts on tb_host_ring.id_host = tb_hosts.id where tb_host_ring.id_ring=$idring)";

$result = $MySQLi->query($query);
*/
$value = $argv[1];

$VlanIfVlanId[4097] = array();

#while($fetch = $result->fetch_assoc()) {

    $session = new SNMP(SNMP::VERSION_2c, $value, "publicaloo");
	$session->valueretrieval = SNMP_VALUE_PLAIN;

    $extremeVlanIfVlanId = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.10", TRUE);

    for ($x=0; $x<=4097; $x++){
        $VlanIfVlanId[$x] = -1;
    }

    foreach($extremeVlanIfVlanId as $i) {
        $VlanIfVlanId[$i] = $i;
        #echo $i."\n";
	}
    
    $myfile = fopen("temp/".$value.".txt","w") or die ("Unable to open file!");

    for ($x=0; $x<=4097; $x++){
        echo $VlanIfVlanId[$x]."\n";
	$txt = $x.";".$VlanIfVlanId[$x]."\n";
	fwrite($myfile,$txt);
    }

    fclose($myfile);
	
#}
?>