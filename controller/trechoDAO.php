<?php
include("BancoMysql.php");

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of trechoDAO
 *
 * @author Sidney
 */
class trechoDAO {

    
    function trechoDAO(){
        
    }
    
    function listaEstacoes(){

        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT id_estacao,sigla_estacao,nome_estacao FROM tb_estacao ORDER BY nome_estacao";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;

    }
    
    function listaCapacidades(){

        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT capacidade FROM tb_capacidade_trecho_aloo ORDER BY id";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
    
    function listaTecnologia(){

        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT tecnologia    FROM tb_tecnologia_trecho_aloo ORDER BY id";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
    
        
    function listaTrecho(){

        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT designador, pontaa, pontab, capacidade FROM tb_trecho_aloo";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
    
    function cadastraTrecho($designador,$tecnologia,$capacidade,$pontaa,$pontab,$observacoes){

        $bancomySQL = new BancoMysql;
        $querySelect = "INSERT INTO tb_trecho_aloo (designador,tecnologia,capacidade,pontaa,pontab,observacoes) values ('$designador','$tecnologia','$capacidade','$pontaa','$pontab','$observacoes')";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
    
    function getSiglaMunicipio($id_estacao){
                   
        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT sigla_municipio FROM tb_estacao WHERE id_estacao="."'$id_estacao'";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
    
        
    function getNomeEstacao($id_estacao){
                   
        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT nome_estacao FROM tb_estacao WHERE id_estacao="."'$id_estacao'";
        $resultQuery = $bancomySQL->executeQuery($querySelect);
        $nome_estacao = mysqli_fetch_array($resultQuery);
        $result = $nome_estacao['nome_estacao'];
        return $result;
        
    }
    
    function getTodosTrechos(){
                   
        $bancomySQL = new BancoMysql;
        $querySelect = "SELECT * FROM tb_trecho_aloo order by id desc";
        $result = $bancomySQL->executeQuery($querySelect);
        
        return $result;
        
    }
}
