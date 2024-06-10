<?php
include ("VlanDAO.php");

$tagvlan = '1100';
$iphost = '10.10.1.1;10.10.10.10;10.10.10.1;1.1.1.1';

$vlandao = new VlanDAO;

$validavlan = $vlandao->tagexistente($tagvlan, $iphost);

echo $validavlan;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

