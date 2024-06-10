<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

# esse script lista as vlan do switch.

$session = new SNMP(SNMP::VERSION_1, "192.168.80.129", "public");
$session->valueretrieval = SNMP_VALUE_PLAIN;

$extremeIfindexDescr = $session->walk(".1.3.6.1.2.1.2.2.1.2", TRUE);
$cont = 0;
foreach($extremeIfindexDescr as $Descr) {
	$str_array = str_split($Descr,4);
	if ($str_array[0] == "VLAN") {
		//echo $Descr."\n";
		list($vlan,$id,$nome) = explode(" ",$Descr);
		$nome = substr($nome, 1,-1);
		//echo "Nome da Vlan: ". substr($nome, 1,-1) . " Tag: " . $id . "\n";
		$nome_vlan_array[$cont] = $nome;
		//echo $nome;
		$cont++;
	}
}

foreach($nome_vlan_array as $nome_vlan) {
	//echo $nome_vlan."\n";
	foreach($extremeIfindexDescr as $Descr) {
		list($nome, $rtif) = explode(" ",$Descr);
		if ($nome == $nome_vlan) {
			echo $nome ." ". substr($rtif,5,-1) ."\n";
			
		}
	}	
}
?>