<?php
$nomering = $_GET["nome_ring"];
$descricaoring = $_GET["descr_anel"];
echo $nomering;
echo $descricaoring;

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

$sql = "INSERT INTO tb_ring (nome_ring,descricao_ring) VALUES ('$nomering', '$descricaoring')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>