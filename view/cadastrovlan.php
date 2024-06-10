<html>
    <body>
        <h1> Cadastro de Vlan no Switch</h1><!-- comment -->
        <form action="../controle/realizaCadastrovlan.php" method="get">
         <table>
              <tr>
                <td>Nome da Vlan:</td>
                <td><input type=text name="nomevlan"></td>
              </tr>
              <tr>
                <td>TAG da VLAN:</td>
                <td><input type=text name="tagvlan"></td>
              </tr>
              <tr>
                <td>IP do Switch</td>
                <td><input type=text name="ipdoswitch"></td>
              </tr>
              <tr>
                <td>Portas da VLAN [ separadas por ; ]</td>
                <td><input type=text name="portasvlan"></td>
              </tr>
            </table>
            <input type="submit" value="Cadastrar">&nbsp;&nbsp;<input type="button" value="Limpar">
        </form>
    </body>
</html>


