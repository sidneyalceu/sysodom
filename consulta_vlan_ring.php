<?php

$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");

$query = "(select id,nome_ring from tb_ring)";

$result = $MySQLi->query($query);

?>
<html>
<body>
	<form action='lista_ring_vlan.php' method='GET'>
        <label for="idring">Escolha o anel lógico</label>
        <select name="idring" id="idring">
            <?php
                while($fetch = $result->fetch_assoc()) {
                ?>
                    <option value="<?=$fetch['id']?>"><?=$fetch['nome_ring']?></option>;
                <?php
                }
            ?>
        </select>
        <input type="submit" value="Consultar VLAN">
    </form>
</html>
