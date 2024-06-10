<html>
<h1> Lista de Vlans do Switch</h1>
<body><table border="1">
<tr>
<td>ID</td>
<td>Nome da Vlan</td>
<td>TAG</td>
</tr>

<?php

//$ip = $_GET['ip'];

$ip = '10.7.0.1';
# esse script lista as vlan do switch.

echo $ip;

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

$session = new SNMP(SNMP::VERSION_2c, $ip, "public");
$session->valueretrieval = SNMP_VALUE_PLAIN;

$ifDescr = $session->walk(".1.3.6.1.2.1.2.2.1.2", TRUE);

echo "oi";

foreach($ifDescr as $ifdescr) {
    //echo $ifdescr;
    $_valor = substr($ifdescr,0,4);
    if ($_valor == "VLAN") {
        //echo $ifdescr;
        list ($tipo, $tag, $vlan_name) = explode(" ",$ifdescr);
        $vlan_name = substr($vlan_name,1,-1);
        echo "<tr>";
        echo "<td>";
        echo $id++;
        echo "</td>";
        echo "<td>";
        echo $vlan_name;
        echo "</td>";
        echo "<td>";
        echo $tag;
        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>
</body>
</html>