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
                <td>Informe os ip dos equipamentos:</td>
                <td><br><br><br>
                  IP do HOST 01 <input type=text name="host01"><br>
                  IP do HOST 02 <input type=text name="host02"><br>
                  IP do HOST 03 <input type=text name="host03"><br>
                  IP do HOST 04 <input type=text name="host04"><br>
                  IP do HOST 05 <input type=text name="host05"><br>
                  IP do HOST 06 <input type=text name="host06"><br>
                  IP do HOST 07 <input type=text name="host07"><br>
                  IP do HOST 08 <input type=text name="host08"><br>
                  IP do HOST 09 <input type=text name="host09"><br>
                  IP do HOST 10 <input type=text name="host10"><br>
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