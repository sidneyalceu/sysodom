<?php
$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");
$query = "SELECT ip_host from tb_hosts where ip_host like '10.7.%'";

$extremeVlanIfType = array();
$extremeVlanIfIndex = array();
$extremeVlanIfVlanId = array();

$extremeVlanIfGlobalIdentifier = array();
$extremeVlanIfStatus = array();
$extremeVlanIfIgnoreStpFlag  = array();
$extremeVlanIfIgnoreBpduFlag  = array();
$extremeVlanIfLoopbackModeFlag = array();
$extremeVlanIfEncapsType  = array();
$extremeVlanIfAdminStatus  = array();

$result = $MySQLi->query($query);
while($fetch = $result->fetch_assoc()) {

    foreach ($fetch as $field => $value) {
		
		$session = new SNMP(SNMP::VERSION_2c, $value, "publicaloo");
		$session->valueretrieval = SNMP_VALUE_PLAIN;

		$extremeVlanIfIndex = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.1", TRUE);
		$extremeVlanIfDesc = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.2", TRUE);
		$extremeVlanIfType = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.3", TRUE);
		$extremeVlanIfGlobalIdentifier = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.4", TRUE);
		$extremeVlanIfStatus = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.6", TRUE);

		# não implementada
		#$extremeVlanIfIgnoreStpFlag  = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.7", TRUE);
		#$extremeVlanIfIgnoreBpduFlag  = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.8", TRUE);

		$extremeVlanIfLoopbackModeFlag = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.9", TRUE);

		$extremeVlanIfVlanId = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.10", TRUE);
		$extremeVlanIfEncapsType  = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.11", TRUE);
		$extremeVlanIfAdminStatus  = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.12", TRUE);


		$n = 0;
		foreach($extremeVlanIfIndex as $i) {
			$VlanIfIndex[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfDesc as $i) {
			$VlanIfDesc[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfType as $i) {
			$VlanIfType[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfGlobalIdentifier as $i) {
			$VlanIfGlobalIdentifier[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfStatus as $i) {
			$VlanIfStatus[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfLoopbackModeFlag as $i) {
			$VlanIfLoopbackModeFlag[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfVlanId as $i) {
			$VlanIfVlanId[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfEncapsType as $i) {
			$VlanIfEncapsType[$n] = $i;
			$n++;
		}

		$n = 0;
		foreach($extremeVlanIfAdminStatus as $i) {
			$VlanIfAdminStatus[$n] = $i;
			$n++;
		}

		for($n = 0; $n < sizeof($VlanIfIndex); $n++) {

		  print "INSERT INTO tb_vlan_hosts (ip_host,vlanifindex,vlanifdesc,vlaniftype,vlanifglobalidentifier,vlanifstatus,vlanifloopbackmodeflag,vlanifvlanid,vlanifencapstype,vlanifadminstatus) VALUES ('$value',$VlanIfIndex[$n],'$VlanIfDesc[$n]',$VlanIfType[$n],$VlanIfGlobalIdentifier[$n],$VlanIfStatus[$n],$VlanIfLoopbackModeFlag[$n],$VlanIfVlanId[$n],$VlanIfEncapsType[$n],$VlanIfAdminStatus[$n]);\n";
		  
		}
		
		unset ($extremeVlanIfIndex);
		unset ($extremeVlanIfDesc);
		unset ($extremeVlanIfType);
		unset ($extremeVlanIfGlobalIdentifier);
		unset ($extremeVlanIfStatus);
		unset ($extremeVlanIfLoopbackModeFlag);
		unset ($extremeVlanIfVlanId);
		unset ($extremeVlanIfEncapsType);
		unset ($extremeVlanIfAdminStatus);
		
		unset ($VlanIfIndex);
		unset ($VlanIfDesc);
		unset ($VlanIfType);
		unset ($VlanIfGlobalIdentifier);
		unset ($VlanIfStatus);
		unset ($VlanIfLoopbackModeFlag);
		unset ($VlanIfVlanId);
		unset ($VlanIfEncapsType);
		unset ($VlanIfAdminStatus);
    }

}
?>
