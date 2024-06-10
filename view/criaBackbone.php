<html>
       
<head>
    <link rel="stylesheet" type="text/css" href="estilo_css_v1.css"/>
    <title> Sistema </title>
</head>
<body>

    <?php
    
    include 'controle/trechoDAO.php';
    include 'menu.php';
    
    
    $trechodao = new trechoDAO;
    
    echo "<BR>";
    include 'menuTrecho.php';
    
    ?>
    <BR>
   <form action="cadastra_backbone.php" method="get" id="trechoForm">
    <table border='0'>
        <tr>
            <td> <label for="pontaa">Ponta A</label></td>
            <td> 
                <select name="pontaa" id="pontaa">
                    <option></option>;
                <?php
                    $resultado = $trechodao->listaEstacoes();
                    
                    while($dados = mysqli_fetch_array($resultado)) {

                        echo "<option value='".$dados['id_estacao']."'>".$dados['nome_estacao']." - [".$dados['sigla_estacao']."]"."</option>";
                    }
                    
                 ?>
                </select>
            </td>
          </tr><tr>
            <td> <label for="pontab">Ponta B</label></td>
            <td> 
                <select name="pontab" id="pontab">
                    <option></option>;
                <?php
                    $resultado = $trechodao->listaEstacoes();
                    
                    while($dadosEstacao = mysqli_fetch_array($resultado)) {

                        echo "<option value='".$dadosEstacao['id_estacao']."'>".$dadosEstacao['nome_estacao']." - [".$dadosEstacao['sigla_estacao']."]"."</option>";
                    }
                    
                 ?>
                </select>
            </td>
          </tr>
          <tr>
            <td>Trechos do Backbone</td>
          <table border='1'>
              <tr><td> Designador </td>
                  <td> Ponta A</td>
                  <td> Ponta B</td>
                  <td> Capacidade </td>
              </tr>
                <?php
                    $resultado = $trechodao->listaTrecho();
                    
                    while($trecho = mysqli_fetch_array($resultado)) {

                        echo "<tr><td><input name='trecho' type='checkbox' value='".$trecho['designador']."'>".$trecho['designador']."</option></td>";
                        echo "<td>".$trechodao->getNomeEstacao($trecho['pontaa'])."</td>";
                        echo "<td>".$trechodao->getNomeEstacao($trecho['pontab'])."</td>";
                        echo "<td>".$trecho['capacidade']."</td></tr>";
                    }
                    
                 ?>
          </table>
          </tr>
          <tr>
            <td><BR><BR><button type="submit">Salvar</button></td>
            <td><BR><BR><button type="submit">Limpar</button></td>
          </tr>
    </table>
</form>
    
    listaTrecho
    
    <?php

    
    ?>

</body>
</html>