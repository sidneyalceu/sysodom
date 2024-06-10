<?php
$str = "RING-PTGtoRCE";

$len = strlen($str);

echo "13.82.73.78.71.45.80.84.71.116.111.82.67.69\n";

function ascii_to_dec($str)
{
  for ($i = 0, $j = strlen($str); $i < $j; $i++) {
    $dec_array[] = ord($str{$i});
  }
  return $dec_array;
}

$dec_string = ascii_to_dec($str);

echo $len;
//echo ".";           

$snmpindex = $len;

foreach($dec_string as $dec){
    echo ".";
    echo $dec;

    $snmpindex = $snmpindex.".".$dec;
}

echo "\n";

echo $snmpindex;

echo "\n";

$ip_do_host =  '10.7.0.1';
$snmpVlanRing = ".1.3.6.1.4.1.1916.1.18.4.1.1.".$snmpindex;

//$extremeVlanRingName = "1.3.6.1.4.1.1916.1.18.1.1.1";

$session = new SNMP(SNMP::VERSION_2c, $ip_do_host, "publicaloo");
$session->valueretrieval = SNMP_VALUE_PLAIN;
$session->max_oids = 100;
$session->oid_increasing_check = FALSE;



echo "\n";
echo $snmpVlanRing;
echo "\n";

$nameVlanRing = $session->walk($snmpVlanRing);

var_dump($nameVlanRing);

echo "\n";
echo $nameVlanRing;
echo "\n";
?>