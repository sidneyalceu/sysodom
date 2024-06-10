<?php
include("../controle/MySQL.php");

$bancomySQL = new BancoMySQL;

$querys = "select * from tb_anel";

$rsAneis = $bancomySQL->executeQuery($querys);
echo "<table border=1>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome do Anel</th>";
echo "<th>Vlan de Controle</th>";
echo "<th>Tag da vlan</th>";
echo "<th>Hosts do Anel [ip]</th>";
echo "</tr>";
while ($row_rsAneis = mysqli_fetch_array($rsAneis))
{
    echo "<tr>";
    echo "<td>".$row_rsAneis["id"]."</td>";
    echo "<td>".$row_rsAneis["nameanel"]."</td>";
    echo "<td>".$row_rsAneis["vlancontrole"]."</td>";
    echo "<td>".$row_rsAneis["tagvlan"]."</td>";
    
    $queryhostAneis = "SELECT iphost FROM tb_anel_host WHERE idanel=".$row_rsAneis["id"];
    
    //echo $queryhostAneis."<BR>";
    
    $rshostAneis = $mySQL->executeQuery($queryhostAneis);
    echo "<td>";
    while ($row_hostAneis = mysqli_fetch_array($rshostAneis))
    {
        echo $row_hostAneis["iphost"].";";
    }    
    echo "</td>";
    echo "</tr>";
}
echo "</table>";