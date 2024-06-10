USE db_Biblioteca;

CREATE TABLE IF NOT EXISTS tb_eaps_ring (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_host_eaps_ring (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    iphost VARCHAR(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_host_eaps_ring_vlan (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome_eaps VARCHAR(50) NOT NULL,
    iphost VARCHAR(15) NOT NULL,
    nome_vlan VARCHAR(50) NOT NULL
);


## BD das operadoras

CREATE TABLE IF NOT EXISTS tb_oper_parc (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome_oper VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_desg_oper (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome_oper VARCHAR(50) NOT NULL,
    desgnador VARCHAR(15) NOT NULL,
    pontaa VARCHAR(50) NOT NULL,
    pontab VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_trecho_aloo (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome_trecho VARCHAR(50) NOT NULL,
    tipo_tecnologia VARCHAR(15) NOT NULL,
    capacidade  VARCHAR(4) NOT NULL,
    pontaa VARCHAR(50) NOT NULL,
    pontab VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_backbone_aloo (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    nome_backbone VARCHAR(50) NOT NULL,
    pontaa VARCHAR(50) NOT NULL,
    pontab VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_backbone_trecho_aloo (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    id_backbone SMALLINT NOT NULL,
    id_trecho SMALLINT NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_capacidade_trecho_aloo (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    capacidade VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_tecnologia_trecho_aloo (
    id  SMALLINT  AUTO_INCREMENT PRIMARY KEY,
    tecnologia VARCHAR(10) NOT NULL
);

insert into tb_capacidade_trecho_aloo (capacidade) values ('25M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('50M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('100M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('150M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('200M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('250M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('300M');
insert into tb_capacidade_trecho_aloo (capacidade) values ('1G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('2G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('3G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('4G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('5G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('6G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('7G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('8G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('9G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('10G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('20G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('30G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('40G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('50G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('60G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('70G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('80G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('90G');
insert into tb_capacidade_trecho_aloo (capacidade) values ('100G');

insert into tb_tecnologia_trecho_aloo (tecnologia) values ('DWDM');
insert into tb_tecnologia_trecho_aloo (tecnologia) values ('SFP');
insert into tb_tecnologia_trecho_aloo (tecnologia) values ('RF');

