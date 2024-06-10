<html>
<head>
<style>
body {
  margin: 0;
  padding: 2rem;
}

table {
  text-align: center;
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
  text-align: left;
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
<?php
$MySQLi = new MySQLi("127.0.0.1","root","indiglo", "db_network");
?>
<body>
	<form action='' method='GET'>
        <label for="eaps">Escolha o Anel Logico</label><br>
            <?php

            $query = "(SELECT id,nome_ring from tb_ring)";

            $result = $MySQLi->query($query);

            while($fetch = $result->fetch_assoc()) {
            ?>
                <input type="radio" name="nomering" value="<?=$fetch['id']?>"><?=$fetch['nome_ring']?><br>
            <?php
            }
            ?>
        </select>
        <br><br><br>

        <label for="eaps">Escolha os Elementos de rede</label>
            <table id="customers">
           
            <?php
            $cont = 1;
            $query = "(SELECT id,nome_host,ip_host from tb_hosts)";
            $result = $MySQLi->query($query);
            while($fetch = $result->fetch_assoc()) {
            
                if ($cont == 1){
                    echo "<tr>";
                }
            ?>
                <td><input type="checkbox" name="<?=$fetch['id'];?>" id="<?=$fetch['id'];?>">
                <label for="<?=$fetch['id'];?>"><?=$fetch['nome_host'];?> - <?=$fetch['ip_host'];?></label></td>
            <?php
                if ($cont == 5){
                    echo "</tr>";
                    $cont = 0;
                }
                $cont++;
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