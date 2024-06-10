<?php
$MySQLi = new MySQLi("127.0.0.1","sidney","indiglo", "banco01");
$query = "SELECT h.ip FROM tb_host AS h INNER JOIN tb_asso_anellogico_host AS ah ON ah.id_host = h.id WHERE ah.id_anel_logico=4";


$extremeVlanIpNetAddress = array();
$extremeVlanIpNetMask = array();
$extremeVlanIpStatus = array();
$extremeVlanIpForwardingState = array();


$result = $MySQLi->query($query);
while($fetch = $result->fetch_assoc()) {

    foreach ($fetch as $field => $value) {
		
		$session = new SNMP(SNMP::VERSION_2c, $value, "publicaloo");
		$session->valueretrieval = SNMP_VALUE_PLAIN;

		$extremeVlanIpNetAddress = $session->walk(".1.3.6.1.4.1.1916.1.2.4.1.1.1", TRUE);
		$extremeVlanIpNetMask = $session->walk(".1.3.6.1.4.1.1916.1.2.4.1.1.2", TRUE);
		$extremeVlanIpStatus = $session->walk(".1.3.6.1.4.1.1916.1.2.4.1.1.3", TRUE);
		$extremeVlanIpForwardingState = $session->walk(".1.3.6.1.4.1.1916.1.2.4.1.1.4", TRUE);

		$n = 0;
		foreach($extremeVlanIpNetAddress as $i => $x) {
			$VlanIndex[$n] = $i;
			$VlanIpNetAddress[$n] = $x;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIpNetMask as $i) {
			$VlanIpNetMask[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIpStatus as $i) {
			$VlanIpStatus[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIpForwardingState as $i) {
			$VlanIpForwardingState[$n] = $i;
			$n++;
		}


		for($n = 0; $n < sizeof($VlanIpNetAddress); $n++) {

		  print "INSERT INTO tb_vlan_hosts (ip_vlan,vlan_index,mask_vlan,ip_vlan_status,ip_vlanforwardingstate) VALUES ('$value',$VlanIndex[$n],$VlanIpNetAddress[$n],'$VlanIpNetMask[$n]',$VlanIpStatus[$n],$VlanIpForwardingState[$n]);\n";
		  
		}
		
		unset ($extremeVlanIpNetAddress);
		unset ($extremeVlanIpNetMask);
		unset ($extremeVlanIpStatus);
		unset ($extremeVlanIpForwardingState); 
		
		unset ($VlanIpNetAddress);
		unset ($VlanIpNetMask);
		unset ($VlanIpStatus);
		unset ($VlanIpForwardingState);
		unset ($VlanIndex);
		
    }

}
?>
