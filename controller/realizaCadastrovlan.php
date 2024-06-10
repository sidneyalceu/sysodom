<?php

$nomevlan = $_GET["nomevlan"];
$tagvlan = $_GET["tagvlan"];
$iphost = $_GET["ipdoswitch"];
$portas = $_GET["portasvlan"];

echo $nomevlan;
echo $tagvlan;
echo $iphost;
echo $portas;

include("BancoMysql.php");
$bancomySQL = new BancoMysql;

$queryInsert = "INSERT INTO tb_vlan_host (nomevlan,tagvlan,iphost) VALUES ("."'$nomevlan','$tagvlan','$iphost')";
echo $queryInsert;
$rsClientes = $bancomySQL->executeQuery($queryInsert);

$querySelect = "SELECT id FROM tb_vlan_host WHERE nomevlan="."'$nomevlan'";
echo $querySelect;
$result = $bancomySQL->executeQuery($querySelect);
$id = mysqli_fetch_array($result);

echo $id[0];

$listaportas = explode(";", "$portas");

foreach ($listaportas as &$porta) {
    $query = "INSERT INTO tb_vlan_portas (id_vlan_host,vlan_porta) VALUES ("."'$id[0]','$porta')";
    $rsIpHost = $bancomySQL->executeQuery($query);
}


$bancomySQL->disconnect;
?>