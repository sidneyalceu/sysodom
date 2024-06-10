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