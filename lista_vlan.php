<?php

$iphost1 = '10.7.0.1';
$iphost2 = '10.7.0.11';
$iphost3 = '10.7.0.12';
$iphost4 = '10.7.1.2';
$iphost5 = '10.7.1.4';
$iphost6 = '10.7.1.1';
$iphost7 = '10.7.0.16';
$iphost8 = '10.7.0.9';
$iphost9 = '10.7.0.23';
$iphost10 = '10.7.0.24';
$iphost11 = '10.7.0.25';
$iphost12 = '10.7.0.29';

$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");
$query = "SELECT h.ip FROM tb_host AS h INNER JOIN tb_asso_anellogico_host AS ah ON ah.id_host = h.id WHERE ah.id_anel_logico=4";

$query1 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.1')";
$query2 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '.10.7.0.11')";
$query3 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.12')";
$query4 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.1.2')";
$query5 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.1.4')";
$query6 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.1.1')";
$query7 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.16')";
$query8 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.9')";
$query9 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.23')";
$query10 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.24')";
$query11 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.25')";
$query12 = "(SELECT vlanifdesc, vlanifvlanid from tb_vlan_hosts WHERE ip_host = '10.7.0.29')";

$result1 = $MySQLi->query($query1);
$result2 = $MySQLi->query($query2);
$result3 = $MySQLi->query($query3);
$result4 = $MySQLi->query($query4);
$result5 = $MySQLi->query($query5);
$result6 = $MySQLi->query($query6);
$result7 = $MySQLi->query($query7);
$result8 = $MySQLi->query($query8);
$result9 = $MySQLi->query($query9);
$result10 = $MySQLi->query($query10);
$result11 = $MySQLi->query($query11);
$result12 = $MySQLi->query($query12);


$vlan_array1[4097] = array();
$vlan_array2[4097] = array();
$vlan_array3[4097] = array();
$vlan_array4[4097] = array();
$vlan_array5[4097] = array();
$vlan_array6[4097] = array();
$vlan_array7[4097] = array();
$vlan_array8[4097] = array();
$vlan_array9[4097] = array();
$vlan_array10[4097] = array();
$vlan_array11[4097] = array();
$vlan_array12[4097] = array();

while($fetch1 = $result1->fetch_assoc()) {
	$vlan_array1[$fetch1["vlanifvlanid"]] = $fetch1["vlanifvlanid"];
}
while($fetch2 = $result2->fetch_assoc()) {
	$vlan_array2[$fetch2["vlanifvlanid"]] = $fetch2["vlanifvlanid"];
}
while($fetch3 = $result3->fetch_assoc()) {
	$vlan_array3[$fetch3["vlanifvlanid"]] = $fetch3["vlanifvlanid"];
}
while($fetch4 = $result4->fetch_assoc()) {
	$vlan_array4[$fetch4["vlanifvlanid"]] = $fetch4["vlanifvlanid"];
}
while($fetch5 = $result5->fetch_assoc()) {
	$vlan_array5[$fetch5["vlanifvlanid"]] = $fetch5["vlanifvlanid"];
}
while($fetch6 = $result6->fetch_assoc()) {
	$vlan_array6[$fetch6["vlanifvlanid"]] = $fetch6["vlanifvlanid"];
}
while($fetch7 = $result7->fetch_assoc()) {
	$vlan_array7[$fetch7["vlanifvlanid"]] = $fetch7["vlanifvlanid"];
}
while($fetch8 = $result8->fetch_assoc()) {
	$vlan_array8[$fetch8["vlanifvlanid"]] = $fetch8["vlanifvlanid"];
}
while($fetch9 = $result9->fetch_assoc()) {
	$vlan_array9[$fetch9["vlanifvlanid"]] = $fetch9["vlanifvlanid"];
}
while($fetch10 = $result10->fetch_assoc()) {
	$vlan_array10[$fetch10["vlanifvlanid"]] = $fetch10["vlanifvlanid"];
}
while($fetch11 = $result11->fetch_assoc()) {
	$vlan_array11[$fetch11["vlanifvlanid"]] = $fetch11["vlanifvlanid"];
}
while($fetch12 = $result12->fetch_assoc()) {
	$vlan_array12[$fetch12["vlanifvlanid"]] = $fetch12["vlanifvlanid"];
}
?>
<html>
<head>
<style>
body {
  margin: 0;
  padding: 2rem;
}

table {
  text-align: left;
  position: relative;
  border-collapse: collapse; 
}
th, td {
  padding: 0.25rem;
}

th {
  background: white;
  position: sticky;
  top: 0; /* Don't forget this, required for the stickiness */
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  font-size: 10px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 2px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #9e27c2; color: #ffffff }

#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
  background-color: #00008B;
  color: white;
}
</style>

<body>

<table id="customers">
 <thead>
   <tr>
    <th>Vlan ID</th>
    <th><?php echo $iphost1 ?></th>
	<th><?php echo $iphost2 ?></th>
	<th><?php echo $iphost3 ?></th>
	<th><?php echo $iphost4 ?></th>
	<th><?php echo $iphost5 ?></th>
	<th><?php echo $iphost6 ?></th>
	<th><?php echo $iphost7 ?></th>
	<th><?php echo $iphost8 ?></th>
	<th><?php echo $iphost9 ?></th>
	<th><?php echo $iphost10 ?></th>
	<th><?php echo $iphost11 ?></th>
	<th><?php echo $iphost12 ?></th>	
  </tr>
  </thead>
  <tbody>
<?php  for($x = 1; $x <= 4096; $x++) { ?>
    <tr>
	<td><?php echo $x ?></td>
	<td><?php echo $vlan_array1[$x];?></td>
	<td><?php echo $vlan_array2[$x];?></td>
	<td><?php echo $vlan_array3[$x];?></td>
	<td><?php echo $vlan_array4[$x];?></td>
	<td><?php echo $vlan_array5[$x];?></td>
	<td><?php echo $vlan_array6[$x];?></td>
	<td><?php echo $vlan_array7[$x];?></td>
	<td><?php echo $vlan_array8[$x];?></td>
	<td><?php echo $vlan_array9[$x];?></td>
	<td><?php echo $vlan_array10[$x];?></td>
	<td><?php echo $vlan_array11[$x];?></td>
	<td><?php echo $vlan_array12[$x];?></td>
  </tr>
<?php } ?>
</tbody>
</table>

</body>
</html>