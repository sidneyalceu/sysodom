<html>
    <body>
        <h1> Cadastro de Anel </h1><!-- comment -->
        <form action="../controle/realizaCadastroanel.php" method="get">
         <table>
              <tr>
                <td>Nome do Anel:</td>
                <td><input type=text name="nomeanel" style="text-transform:uppercase"></td>
              </tr>
              <tr>
                <td>Tipo de Anel:</td>
                <td><select name="tipoanel" id="tipoanel">
                        <option value="eaps">EAPS</option>
                        <option value="erp">ERP</option>
                        <option value="erps">ERPS</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Vlan de Controle:</td>
                <td><input type=text name="vlancontrole" style="text-transform:uppercase"></td>
              </tr>
              <tr>
                <td>TAG da VLAN de Controle:</td>
                <td><input type=text name="tagvlan" style="text-transform:uppercase"></td>
              </tr>
              <tr>
                <td>IP dos Switch [separados por ";"]</td>
                <td><textarea name="ipdosswitch" style="text-transform:uppercase"></textarea></td>
              </tr>
              <tr>
                  <td>Porta dos Switch <br>separados por "[&nbsp] - e ;  ex: [9-10];[11-12]<BR> na respectiva ordem dos hosts</td>
                <td><textarea name="portasdosswitch" style="text-transform:uppercase"></textarea></td>
              </tr>
            </table>
            <input type="submit" value="Cadastrar">&nbsp;&nbsp;<input type="button" value="limpa">
        </form>
    </body>
</html>


