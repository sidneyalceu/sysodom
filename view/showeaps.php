<?php

include("../controle/BancoMysql.php");

$bancomySQL = new BancoMysql;

$querySelectiphost = "SELECT distinct ip_host FROM tb_rings_hosts";
$resultiphost = $bancomySQL->executeQuery($querySelectiphost);

while ($row_iphost = mysqli_fetch_array($resultiphost)){
    echo $row_iphost['ip_host'];
    $iphost = $row_iphost['ip_host'];
    $querySelectrings = "SELECT nome_ring FROM tb_rings_hosts WHERE ip_host="."'$iphost'";
    $resultrings = $bancomySQL->executeQuery($querySelectrings);
    while ($row_rings = mysqli_fetch_array($resultrings)){
        echo ";".$row_rings['nome_ring'];
    }
    echo "<BR>";
}
    
$querySelectiphost = "SELECT distinct ip_host FROM tb_rings_hosts";
$resultiphost = $bancomySQL->executeQuery($querySelectiphost);

$querySelectrings = "SELECT nome_ring FROM tb_rings_hosts WHERE ip_host="."'$iphost'";
$resultrings = $bancomySQL->executeQuery($querySelectrings);

while ($row_iphost = mysqli_fetch_array($resultiphost)){
    echo $row_iphost['ip_host'];
    $iphost = $row_iphost['ip_host'];
    $querySelectrings = "SELECT nome_ring FROM tb_rings_hosts WHERE ip_host="."'$iphost'";
    $resultrings = $bancomySQL->executeQuery($querySelectrings);
    while ($row_rings = mysqli_fetch_array($resultrings)){
        echo ";".$row_rings['nome_ring'];
    }
    echo "<BR>";
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

