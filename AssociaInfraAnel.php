<?php
header("Content-Type: text/html; charset=utf-8",true);

function my_autoload ($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}
spl_autoload_register("my_autoload");

?>
<html>
<body>
    <h1> Associar anel logico ao anel fisico </h1>
    <h2>  
    <form action=infraBackboneSave.php>
        <table border='0'>
            <tr>
                <td>Selecione infra Fisica:</td>
                <td>
                <select name="anelfisico" id="anelfisico">
                <?php
               
               $daotabela = new DaoTabela("tb_anelfisico");
               $resultado = $daotabela->showSelect();
               
                foreach ($resultado as $row){
                    echo "<option value='".$row->ID."'>".$row->NOME."</option>";
                }
                ?>
                </select>   
                </td>
            </tr>
            <tr>
                <td>Selecione camada logica:</td>
                <td>
                <select name="estacoes" id="estacoes" multiple size=20>
                <?php
                
                $daotabela = new DaoTabela("tb_estacoes");
                $resultado = $daotabela->showSelect();
                
                foreach ($resultado as $row){
                    echo "<option value='".$row->ID."'>".$row->NOME."</option>";
                }
                ?>
                </select>
                </td>
                <td>Selecione camada logica:</td>
                <td>
                <select name="anellogico" id="anellogico" multiple size=20>
                <?php
                
                $daotabela = new DaoTabela("tb_anellogico");
                $resultado = $daotabela->showSelect();
                
                foreach ($resultado as $row){
                    echo "<option value='".$row->ID."'>".$row->NOME."</option>";
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Associar"></td>
                <td><input type="button" value="Limpar"></td>
            </tr>
        </table> 
    </form>
</body>
</html>
