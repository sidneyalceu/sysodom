<?php
    
    include 'menu.php';
    include 'menuTrecho.php';
    include 'controle/trechoDAO.php';


    $tecnologia = $_POST['tecnologia'];
    $capacidade = $_POST['capacidade'];
    $id_estacao_a = $_POST['pontaa'];   
    $id_estacao_b = $_POST['pontab'];
    $observacoes = $_POST['observacoes'];

    //echo $id_estacao_a;
    
    $trechodao = new trechoDAO;
  
    $pontaa_mun = $trechodao->getSiglaMunicipio($id_estacao_a);
        
    $dadosA = mysqli_fetch_array($pontaa_mun);
    $siglaA = $dadosA['sigla_municipio'];
    
    $pontab_mun = $trechodao->getSiglaMunicipio($id_estacao_b);
        
    $dadosB = mysqli_fetch_array($pontab_mun);
    $siglaB = $dadosB['sigla_municipio'];
    
    $designador = $siglaA.$siglaB.$tecnologia.'0001';
    
    $resultcadastro = $trechodao->cadastraTrecho($designador, $tecnologia, $capacidade, $id_estacao_a, $id_estacao_b, $observacoes);
    
    $resultlistaTrechos = $trechodao->getTodosTrechos();
    
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>DESIGNADOR</td>";
    echo "<td>TECNOLOGIA</td>";
    echo "<td>CAPACIDADE</td>";
    echo "<td>PONTA A</td>";
    echo "<td>PONTA B</td>";
    echo "<td>OBSERVACAO</td>";
    echo "</tr>";
    
    while($trecho = mysqli_fetch_array($resultlistaTrechos)) {
        
        echo "<tr>";
        echo "<td>";
        echo $trecho['id'];
        echo "</td>";
        echo "<td>";
        echo $trecho['designador'];
        echo "</td>";
        echo "<td>";
        echo $trecho['tecnologia'];
        echo "</td>";
        echo "<td>";
        echo $trecho['capacidade'];
        echo "</td>";
        echo "<td>";
        echo $trecho['pontaa'];
        echo "</td>";
        echo "<td>";
        echo $trecho['pontab'];
        echo "</td>";
        echo "<td>";
        echo $trecho['observacoes'];
        echo "</td>";
        echo "</tr>";
    }

    ?>
    
    </table>
    
</body>
</html>