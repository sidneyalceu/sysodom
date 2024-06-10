<?php

$nomeanel = $_GET["nomeanel"];
$vlancontrole = $_GET["vlancontrole"];
$tagvlan = $_GET["tagvlan"];
$iphost = $_GET["ipdosswitch"];

echo $nomeanel;
echo $vlancontrole;
echo $tagvlan;

include("BancoMysql.php");
$bancomySQL = new BancoMysql;

$listiphost = explode(";", "$iphost");

foreach ($listiphost as &$iphost) {
    $querySelect = "SELECT id FROM tb_vlan_host WHERE tagvlan="."'$tagvlan' and iphost="."'$iphost'";
    echo $querySelect;
    $result = $bancomySQL->executeQuery($querySelect);
    $id = mysqli_fetch_array($result);

    echo $id[0];
}

echo $querySelect;
$result = $bancomySQL->executeQuery($querySelect);
$id = mysqli_fetch_array($result);

echo $id[0];

$queryInsert = "INSERT INTO tb_anel (nameanel,vlancontrole,tagvlan) VALUES ("."'$nomeanel','$vlancontrole','$tagvlan')";
$rsClientes = $mySQL->executeQuery($queryInsert);

$querySelect = "SELECT id FROM tb_anel WHERE nameanel="."'$nomeanel'";
echo $querySelect;
$result = $bancomySQL->executeQuery($querySelect);
$id = mysqli_fetch_array($result);

echo $id[0];



foreach ($listiphost as &$iphost) {
    $query = "INSERT INTO tb_anel_host (idanel,iphost) VALUES ("."'$id[0]','$iphost')";
    $rsIpHost = $mySQL->executeQuery($query);
}


$bancomySQL->disconnect;
?>