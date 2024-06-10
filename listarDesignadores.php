<?php

    include 'menu.php';
    include 'menuTrecho.php';
    include 'controle/trechoDAO.php';

    //echo $id_estacao_a;
    
    $trechodao = new trechoDAO;
  
    $resultlistaTrechos = $trechodao->getTodosTrechos();
    
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <table border='1'>
    <caption>Trechos de Backbone</caption>
    <thead>
    <tr>
    <th>Id</th>
    <th>Designador</th>
    <th>Tecnologia</th>
    <th>Capacidade</th>
    <th>Estacao Ponta A</th>
    <th>Estacao Ponta B</th>
    <th>Observacao</th>
    </tr>   
    </thead>
    <tbody>
    
        <?php
    
    while($trecho = mysqli_fetch_array($resultlistaTrechos)) {
        
        echo "<tr>";
        echo "<td class=''>";
        echo $trecho['id'];
        echo "</td>";
        echo "<td class=''>";
        echo $trecho['designador'];
        echo "</td>";
        echo "<td class=''>";
        echo $trecho['tecnologia'];
        echo "</td>";
        echo "<td class=''>";
        echo $trecho['capacidade'];
        echo "</td>";
        echo "<td class=''>";
        $id_estacao = $trecho['pontaa'];
        $nome_estacao = $trechodao->getNomeEstacao($id_estacao);
        echo $nome_estacao;
        echo "</td>";
        echo "<td class=''>";
        $id_estacao = $trecho['pontab'];
        $nome_estacao = $trechodao->getNomeEstacao($id_estacao);
        echo $nome_estacao;
        echo "</td>";
        echo "<td class=''>";
        echo $trecho['observacoes'];
        echo "</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
    </table>
    
</body>
</html>
