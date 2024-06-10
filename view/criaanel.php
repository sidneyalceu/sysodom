<html>
    <head></head>
    <title>Criando um Trecho fisico </title>
    <body>
        <form>
        <h1> Criando uma trecho físico</h1><BR>
        <form>
            Digite o nome do Anel ou Trecho: <input type=text name='trecho'></input><BR><BR>
            Tipo de de trecho [ anel ou flat]:
            <select name="tipotrecho" id="tipotrecho">
            <option value="CLIENTEF">CLIENTE FINAL</option>
            <option value="BACKBONE">BACKBONE</option>
            </select>
            <BR><BR>
            Tecnologia do Trecho:
            <select name="tectrecho" id="tipotrecho">
            <option value="ENLACE DE RADIO">ENLACE DE RADIO</option>
            <option value="FIBRA OPTICA">FIBRA OPTICA</option>
            <option value="GPON">GPON</option>
            <option value="WAVELETHN">WAVELATHE</option>
            </select>
            <BR><BR> 
            Capacidade do Trecho:
            <select name="captrecho" id="tipotrecho">
            <option value="1G">1G</option>
            <option value="10G">10G</option>
            <option value="40G">40G</option>
            <option value="100G">100G</option>
            </select>
            <BR><BR>            
            Descrição do trecho/anel: <input type=text name='descricao'></input>
        </form>        
    </body>
</html>