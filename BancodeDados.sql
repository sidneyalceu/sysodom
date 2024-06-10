Banco de dados da aplicação
CREATE DATABASE db_network;

/*
Tabela com dados de largura de banda
*/
CREATE TABLE tb_sigla_municipios (
id INT AUTO_INCREMENT,
uf VARCHAR(32) NOT NULL,
estado VARCHAR(32) NOT NULL,
cidade VARCHAR(50) NOT NULL,
sigla  VARCHAR(4) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE tb_trecho_capacidade (
id INT AUTO_INCREMENT,
descricao VARCHAR(32) NOT NULL,
largurabanda INT(10) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE tb_trecho_tecnologia (
id INT AUTO_INCREMENT,
descricao VARCHAR(32) NOT NULL,
id_tecnologia VARCHAR(2) NOT NULL, /* DWDM = WD FIBRA OPTICA = FO GPON = GP  */
PRIMARY KEY (id)
);

CREATE TABLE tb_trecho_tipo (
id INT AUTO_INCREMENT,
descricao VARCHAR(32) NOT NULL,
tipo VARCHAR(20) NOT NULL,
id_tipo VARCHAR(2) NOT NULL, /* CLIENTE = CL BACKBONE = BK */
PRIMARY KEY (id)
);

CREATE TABLE tb_trecho (
id INT AUTO_INCREMENT,
id_trecho_descricao INT NOT NULL,
id_trecho_tipo INT NOT NULL,
desgnador VARCHAR(20) NOT NULL,
PRIMARY KEY (id)
);

/*

Tabela de cadastro de RINGs EAPS
Tabela tb_eaps_info ira conter informações basicas sobre o anel eaps
*/
CREATE TABLE tb_eaps_info (
id INT AUTO_INCREMENT,
id_eaps INT(10) NOT NULL,
nome_eaps VARCHAR(32) NOT NULL,
vlan_controle_eaps VARCHAR(32) NOT NULL,
vlan_controle_tag_eaps INT(4) NOT NULL,
PRIMARY KEY (id_eaps)
);

CREATE TABLE tb_eaps_switch (
id INT AUTO_INCREMENT PRIMARY KEY,
id_eaps INT(10) NOT NULL,
id_switch_extreme VARCHAR(32) NOT NULL,
porta_pri_eaps INT(2) NOT NULL,
porta_sec_eaps INT(2) NOT NULL
);

CREATE TABLE tb_switch_extreme (
id INT AUTO_INCREMENT PRIMARY KEY,
id_switch_extreme INT(10) NOT NULL,
ip_switch_extreme VARCHAR(15) NOT NULL,
hostname_switch_extreme VARCHAR(32) NOT NULL
);

CREATE TABLE tb_eaps_info (
id_eaps INT AUTO_INCREMENT,
nome_eaps VARCHAR(32) NOT NULL,
vlan_controle_eaps VARCHAR(32) NOT NULL,
vlan_controle_tag_eaps INT(4) NOT NULL,
porta_pri_eaps INT(2) NOT NULL,
porta_sec_eaps INT(2) NOT NULL,
PRIMARY KEY (id_eaps)
);



CREATE TABLE tb_estacao (
id INT unsigned NOT NULL AUTO_INCREMENT,
id_estacao INT NOT NULL,
sigla_estacao VARCHAR(30) NOT NULL,
nome_estacao VARCHAR(30) NOT NULL,
endereco_estacao VARCHAR(200) DEFAULT NULL,
status_estacao VARCHAR(50) DEFAULT NULL,
PRIMARY KEY (id)
);
