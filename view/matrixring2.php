<?php

include("../controle/BancoMysql.php");
echo "<html><title> Lista de EAPS por HOSTS</title>";
echo "<head>  <link rel='stylesheet' href='stilo.css'></head>";

$bancomySQL = new BancoMysql;

$querySelectiphost = "SELECT distinct ip_host FROM tb_rings_hosts";
$resultiphost = $bancomySQL->executeQuery($querySelectiphost);


$row_iphost_num = $resultiphost->num_rows;

$querySelectrings = "SELECT distinct nome_ring FROM tb_rings_hosts";
$resultrings = $bancomySQL->executeQuery($querySelectrings);


$row_nomerings_num = $resultrings->num_rows;
//var_dump($row_nomerings);
$ring = array();

echo "<table><thead><tr><th></th>";
while ($row_iphost = mysqli_fetch_array($resultiphost)){
     echo "<th><a href="."telnet://".$row_iphost['ip_host'].">".$row_iphost['ip_host']."</th>";
     array_push($ring,$row_iphost['ip_host']);
}
echo "</tr></thead><tbody>";
//var_dump($ring);
$d = 0;
while ($row_nomerings = mysqli_fetch_array($resultrings)){
    echo "<tr>";
    $iphost = $row_nomerings['nome_ring'];
    echo "<td class='headcol'>".$row_nomerings['nome_ring']."</td>";
    while ($d <$row_iphost_num){
        echo "<td>";
        $querySelectid = "SELECT id FROM tb_rings_hosts where ip_host="."'$ring[$d]'"." and nome_ring="."'$iphost'"." limit 1";
        //echo $querySelectid;
        $resultid = $bancomySQL->executeQuery($querySelectid);
        $row_id = mysqli_fetch_array($resultid);
        if ($row_id['id']){
            echo "1";
        } else {
            echo " ";
        }
        echo "</td>";
        $d++;
    }
    $d=0;
    echo "</tr>";
}
echo "</tbody></table></body></html>";
