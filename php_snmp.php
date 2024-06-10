<?php
$session = new SNMP(SNMP::VERSION_1, "172.22.0.39", "publicaloo");
$session->valueretrieval = SNMP_VALUE_PLAIN;

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


//$extremeVlanIfIndex = $session->walk(".1.3.6.1.4.1.1916.1.2.1.2.1.1," TRUE);
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

  print "$VlanIfIndex[$n] $VlanIfDesc[$n] $VlanIfType[$n] $VlanIfGlobalIdentifier[$n] $VlanIfStatus[$n] $VlanIfLoopbackModeFlag[$n] $VlanIfVlanId[$n] $VlanIfEncapsType[$n] $VlanIfAdminStatus[$n]\n";
  
}

?>