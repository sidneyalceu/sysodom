<html>
<?php
$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");
?>
<body>
	<form action='cadastro_host_estacao.php' method='GET'>
        <label for="iphost">Escolha o Equipamento</label>

        <select name="iphost" id="iphost" size="20">
            <option value="0"></option>;
            <?php

            $query_host = "(SELECT id,ip_host, nome_host from tb_hosts)";

            $result_host = $MySQLi->query($query_host);

            while($fetch = $result_host->fetch_assoc()) {
            ?>
                <option value="<?=$fetch['id']?>"><?=$fetch['nome_host']." ".$fetch['ip_host']?></option>;
            <?php
            }
            ?>
        </select>
        <br><br><br>

        <label for="estacao">Escolha a estação</label>

        <select name="idestacao" id="idestacao" size="20">
            <option value="0"></option>;
            <?php

            $query_estacao = "(SELECT id,id_estacao, nome_estacao from tb_estacao ORDER BY id_estacao ASC)";

            $result_estacao = $MySQLi->query($query_estacao);

            while($fetch = $result_estacao->fetch_assoc()) {
            ?>
                <option value="<?=$fetch['id']?>"><?=$fetch['nome_estacao']." ".$fetch['id_estacao']?></option>;
            <?php
            }
            ?>
        </select>
        <br>
        <input type="submit"> 
		</form>
	</body>
    <?php
        $MySQLi->close();
    ?>
</html>