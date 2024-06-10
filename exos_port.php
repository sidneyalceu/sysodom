<?php
# esse script quantifica o total de portas no switch.

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


echo $cont;
echo "\n";

?>
	