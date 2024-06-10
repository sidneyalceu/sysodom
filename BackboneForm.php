<?php
header("Content-Type: text/html; charset=utf-8",true);

/*function __autoload( $classe ){
    if(file_exists( "{$classe}.php" )) {
          include_once "{$classe}.php";
    } else {
          echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
    }
}
*/

function my_autoload ($pClassName) {
    include(__DIR__ . "/" . $pClassName . ".php");
}
spl_autoload_register("my_autoload");

$daotabela = new DaoTabela("tb_anelfisico");
$resultado = $daotabela->showSelect();

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
                <select name="anellogico" id="anellogico" multiple>
                <?php
                
                $daotabela = new DaoTabela("tb_anellogico");
                $resultado = $daotabela->showSelect();
                
                foreach ($resultado as $row){
                    echo "<option value='".$row->ID."'>".$row->NOME."</option>";
                }
                ?>
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
