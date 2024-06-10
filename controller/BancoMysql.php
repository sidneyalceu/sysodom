 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexaoClass
 *
 * @author Sidney
 */
class BancoMysql {

    var $user = "sidney"; 
    var $password = "indiglo"; 
    var $database = "db_network"; 

    # O hostname deve ser sempre localhost 
    var $hostname = "localhost"; 

    # Conecta com o servidor de banco de dados
    function BancoMysql(){
    }
    function connect(){
        
        $this->link = new MySQLi($this->hostname,$this->user,$this->password);

        if(!$this->link)
        {
            echo "Falha na conexao com o Banco de Dados!<br />";
            echo "Erro: " . mysqli_connect_error();
            die();
        }
            elseif(!mysqli_select_db($this->link, $this->database))
        {
            echo "O Banco de Dados solicitado não pode ser aberto!<br />";
            echo "Erro: " . mysqli_connect_error();
            die();
        }
    }

    function executeQuery($query){
        $this->connect();
        $this->query=$query;
        if($this->result=mysqli_query($this->link,$this->query))
        {
            $this->disconnect();
            return $this->result;
        }
        else
        {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . mysqli_error();
            echo "SQL: " . $query;
            die();
            disconnect();
        }
    }
    
    function disconnect(){
        return mysqli_close($this->link);
    }
}
