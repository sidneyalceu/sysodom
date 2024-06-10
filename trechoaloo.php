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
    //$resultado = $trechodao->listaEstacoes();
    
    ?>
    <BR>
    <?php
        include 'menuTrecho.php';
    ?>
    <BR>
   <form action="cadastra_trecho.php" method="post" id="trechoForm">
    <table border='0'>
        <tr>
            <td> Desginador do Trecho:</td>
            <td> <input type='text' disabled="1"></td>
        </tr><tr>
            <td> <label for="tecnologia">Tecnologia</label></td>
            <td> 
                <select name="tecnologia" id="tecnologia">
                    <option></option>;
                <?php
                    $resultado = $trechodao->listaTecnologia();
                    
                    while($dados = mysqli_fetch_array($resultado)) {

                        echo "<option value='".$dados['tecnologia']."'>".$dados['tecnologia']."</option>";
                    }
                    
                 ?>
                </select>
         </tr><tr>
             <td> <label for="capacidade">Capacidade</label></td>
            <td> 
                <select name="capacidade" id="capacidade">
                    <option></option>;
                <?php
                    $resultado = $trechodao->listaCapacidades();
                    
                    while($dados = mysqli_fetch_array($resultado)) {

                        echo "<option value='".$dados['capacidade']."'>".$dados['capacidade']."</option>";
                    }
                    
                 ?>
                </select>
         </tr><tr>
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
            <td>Observacoes</td>
            <td><textarea maxlength=250 rows=10 cols="50" name="observacoes" id="observacoes" form="trechoForm"></textarea> </td>
          </tr>
          <tr>
            <td><BR><BR><button type="submit">Salvar</button></td>
            <td><BR><BR><button type="submit">Limpar</button></td>
          </tr>
    </table>
</form>
    
    <?php

    
    ?>

</body>
</html>
