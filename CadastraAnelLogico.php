<?php

function my_autoload ($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}
spl_autoload_register("my_autoload");

$anellogico = new AnelLogico();

$anellogico->Hostname()->setIp("10.10.10.1");
$anellogico->setNome("Teste");
echo $anellogico->Hostname()->getIp();

?>