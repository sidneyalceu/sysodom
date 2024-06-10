<?php
# esse script lista as vlan do switch.

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

$ip_do_host = $argv[1];
echo "$ip_do_host\n";

$extremeVlanRing = "1.3.6.1.4.1.1916.1.18.4.1.1";
$extremeVlanRingName = "1.3.6.1.4.1.1916.1.18.1.1.1";

$session = new SNMP(SNMP::VERSION_2c, $ip_do_host, "public");
$session->valueretrieval = SNMP_VALUE_PLAIN;

$extremeIfindexDescr = $session->walk(".1.3.6.1.2.1.2.2.1.2", TRUE);

$d=0;

foreach($extremeIfindexDescr as $Descr) {
	$str_array = str_split($Descr,4);
	if ($str_array[0] == "VLAN") {
		//echo $Descr."\n";
		list($vlan,$id,$nome) = explode(" ",$Descr);
                $nome_vlan[$d] = substr($nome, 1,-1);
                $d++;
		//echo "Nome da Vlan: ". substr($nome, 1,-1) . " Tag: " . $id . "\n";
		$vlan_array = $nome;
	}
}

$id0 = 0;
$id1 = 0;
$id2 = 0;
$id3 = 0;
$id4 = 0;

foreach($nome_vlan as $nomedavlan){
    list($emp,$contrato,$servico) = explode("-",$nomedavlan,-1);

    if ($emp == "P2P" || $emp == "p2p"){
        $listaVlanP2P[$id1] = $nomedavlan;
        $id1++;
    } elseif ($emp == "TRANSPORTE" || $emp == "TRANSP"){
        $listaVman[$id2] = $nomedavlan;
        $id2++; 
    } elseif ($emp == "GER" || $emp == "GERENCIA" || $emp == "Ger" || $emp == "Gerencia" || $emp == "gerencia"){
        $listaVlanGerencia[$id3] = $nomedavlan;
        $id3++;
    } elseif ($servico == "GER" || $servico == "GERENCIA"){
        $listaVlanGerencia[$id3] = $nomedavlan;
        $id3++;
    } elseif ($emp == "Cont" || $emp == "controle"){
        $listaVlanControle[$id4] = $nomedavlan;
        $id4++;
    } else {
        $listaVlanClientes[$id5] = $nomedavlan;
        $id5++;
    }
}

foreach($listaVlanClientes as $cliente) {
    list($emp,$contrato,$produto) = explode("-",$cliente);
    echo $cliente." - ".$emp.";",$contrato.";".$produto."\n";	
}