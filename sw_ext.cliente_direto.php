<?php 
$con = new MySQLi("127.0.0.1","sidney","indiglo", "db_network");
/* 
 * 
 * Este script recebe o ip do swicth extreme e faz a leitura das portas em busca de clientes
 *  
 */
#var_dump($argv);

error_reporting(0);

$ip = $argv[1];
#$ip = '172.22.0.9';


/*
 * O script faz a leitura do mib ifalias 1.3.6.1.2.1.31.1.1.1.18 e monta um array e depois ele vai comparar com uma base
 * de dados para saber o nome do cliente e contrato.
 */

$portadescr = array();
        
$session = new SNMP(SNMP::VERSION_2c, $ip, "publicaloo");
$session->valueretrieval = SNMP_VALUE_PLAIN;

print "Realizando leitura dos descritores de porta em busca de clientes\n";
print "Portas com inciais 'CLI' serão defindas com porta cliente\n";

$portadescr = $session->walk(".1.3.6.1.2.1.31.1.1.1.18", TRUE);

print "Buscando cliente na base de dados...\n";
foreach($portadescr as $descr) {
    if (isset($descr)){
        list ($id,$contrato) = explode ('-',$descr,2); 
        if ($id == 'CLI'){
            #print $emp;
            #$contrato = 'MCORGO22123';
            print $contrato;
            print " ---> ";
            #$query = "SELECT status,produto,cidade,replace(contrato, ' ' , '-') as sys_contrato from tb_clientes_sys where sys_contrato like ?";
            $query = "SELECT nome_fantasia,status,produto,cidade,sys_contrato from tb_clientes_sys2 where sys_contrato=?";
            if ($stmt = $con->prepare($query)) {
                
                $stmt->bind_param('s', $contrato);
                
                $stmt->execute();
                $stmt->bind_result($nome_fantasia, $status,$produto,$cidade,$sys_contrato);
                $stmt->fetch();
                
                echo "$nome_fantasia $status $produto $cidade $sys_contrato\n";
                
                $stmt->close();
            } else {
                
                echo "failed to fetch data\n";
            }
        }
    }
}
$con->close();
?>