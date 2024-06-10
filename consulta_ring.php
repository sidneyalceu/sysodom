<?php
$servername = "localhost";
$username = "root";
$password = "indiglo";
$dbname = "db_network";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "(SELECT nome_ring,descricao_ring from tb_ring)";

$result = $conn->query($query);
?>
<html>
<body>
<table border=1>
  <tr>
    <th>Nome do Anel</th>
    <th>Descrição</th>
 </tr>
 <tr>
<?php
    while($fetch = $result->fetch_assoc()) {
?>
  <tr>
  <td><?=$fetch['nome_ring'];?></td>
  <td><?=$fetch['descricao_ring'];?></td>
 </tr>
<?php
    }
    $conn->close();
?>
<table>
</body>
</hmtl>