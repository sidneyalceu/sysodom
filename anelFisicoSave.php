<?php

$nome = $_GET['nome'];
$descricao = $_GET['descricao'];

header("Content-Type: text/html; charset=utf-8",true);

function __autoload( $classe ){
    if(file_exists( "{$classe}.php" )) {
          include_once "{$classe}.php";
       } else {
          echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
       }
    }
   
// Nesta etapa criamos um objeto de contato e logo em seguida vamos fazer destes dados persistentes no banco de dados

$anelfisico = new AnelFisico($nome,$descricao);

// Então primeiro criamos um novo objeto DAO

$daoanelfisico = new DaoAnelFisico();

// Para persistencia de dados do objeto contato, usamos o método create passando o nosso objeto de contato como parâmetro

if($daoanelfisico->create($anelfisico)){
       echo 'Inseridos no banco com Êxito';
}

// Agora podemos testar outra funcionalidade, recuperar os dados persistidos no dados no banco para um novo objeto de contatos, usamos o método read do nosso DAO. O
//var_dump está sendo usado apenas para facilitar a visualização do objeto sem precisar inserir mais códigos

var_dump($daoanelfisico->read(1));

?>
