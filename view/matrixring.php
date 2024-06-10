<?php

include("../controle/BancoMysql.php");

$bancomySQL = new BancoMysql;

$querySelectiphost = "SELECT distinct ip_host FROM tb_rings_hosts";
$resultiphost = $bancomySQL->executeQuery($querySelectiphost);


$row_iphost_num = $resultiphost->num_rows;

$querySelectrings = "SELECT distinct nome_ring FROM tb_rings_hosts";
$resultrings = $bancomySQL->executeQuery($querySelectrings);


$row_nomerings_num = $resultrings->num_rows;
//var_dump($row_nomerings);
$ring = array();
echo $row_iphost_num;
echo $row_nomerings_num;
echo "<table border=1><tr><td></td>";
while ($row_nomerings = mysqli_fetch_array($resultrings)){
     echo "<td>".$row_nomerings['nome_ring']."</td>";
     array_push($ring,$row_nomerings['nome_ring']);
}
echo "</tr>";
//var_dump($ring);
$d = 0;
while ($row_iphost = mysqli_fetch_array($resultiphost)){
    echo "<tr>";
    $iphost = $row_iphost['ip_host'];
    echo "<td>".$row_iphost['ip_host']."</td>";
    while ($d <$row_nomerings_num){
        echo "<td>";
        $querySelectid = "SELECT id FROM tb_rings_hosts where ip_host="."'$iphost'"." and nome_ring="."'$ring[$d]'"." limit 1";
        //echo $querySelectid;
        $resultid = $bancomySQL->executeQuery($querySelectid);
        $row_id = mysqli_fetch_array($resultid);
        if ($row_id['id']){
            echo "1";
        } else {
            echo "0";
        }
        echo "</td>";
        $d++;
    }
    $d=0;
    echo "</tr>";
}

echo "</table>";

/*
while ($x <= $row_nomerings_num ){
    
}
    
    = mysqli_fetch_array($resultrings)){
    $nome_ring = $row_rings['nome_ring'];
//$matrixring[$row_nomerings][$row_iphost] = array;


//echo count($row_iphost);
/*
while ($row_rings = mysqli_fetch_array($resultrings)){
    $nome_ring = $row_rings['nome_ring'];

while ($row_rings = mysqli_fetch_array($resultrings)){
    $nome_ring = $row_rings['nome_ring'];
    while ($row_iphost = mysqli_fetch_array($resultiphost)){
        $iphost = $row_iphost['ip_host'];
        $querySelectid = "SELECT id FROM tb_rings_hosts where ip_host="."'$iphost'"." and nome_ring="."'$nome_ring' limit 1";
        $resultid = $bancomySQL->executeQuery($querySelectid);
        $row_id = mysqli_fetch_array($resultid);
        if ($row_id['id']){
            $retorno = 1;
        } else {
            $retorno = 0;
        }
    }
    echo "<BR>";
}*/
