<?php
$username='sidney';
$password='indiglo';
$db='lab_sistema';
$tabela='tb_trecho_tipo';

$id = 1;
try {
  $conn = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
  $stmt = $conn->prepare('SELECT * FROM :tabela WHERE id = :id');
  $stmt->execute(array('id' => $id));

  $result = $stmt->fetchAll();

  if ( count($result) ) {
    foreach($result as $row) {
      print_r($row);
    }
  } else {
    echo "Nennhum resultado retornado.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>