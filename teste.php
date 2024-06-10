<?php
header("Content-Type: text/html; charset=utf-8",true);

function my_autoload ($pClassName) {
  include(__DIR__ . "/" . $pClassName . ".php");
}
spl_autoload_register("my_autoload");

$snmphost = new SnmpHost('10.7.0.1','publicaloo');
    
$namesEaps = $snmphost->snmpGetListEapsMbrVlanNameExOS();

foreach ($namesEaps as $name){
  echo "<br>".$name;
}