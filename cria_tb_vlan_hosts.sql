CREATE TABLE tb_vlan_hosts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ip_host VARCHAR(30) NOT NULL,
vlanifindex INT(10) NOT NULL,
vlanifdesc VARCHAR(50) NOT NULL,
vlaniftype INT(1) NOT NULL,
vlanifglobalidentifier INT(1) NOT NULL,
vlanifstatus INT(1) NOT NULL,
vlanifloopbackmodeflag INT(1) NOT NULL,
vlanifvlanid INT(4) NOT NULL,
vlanifencapstype INT(1) NOT NULL,
vlanifadminstatus INT(1) NOT NULL
);

CREATE TABLE tb_host_estacao (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_estacao INT(11) UNSIGNED,
id_host INT(11) UNSIGNED,
CONSTRAINT fk_id_estacao FOREIGN KEY (id_estacao) REFERENCES tb_estacao(id)
CONSTRAINT fk_id_host FOREIGN KEY (id_host) REFERENCES tb_hosts(id)
);

# Cria tabela tb_ring

CREATE TABLE tb_ring (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome_ring VARCHAR(50) NOT NULL,
descricao_ring VARCHAR(255)
);
ALTER TABLE tb_ring ADD CONSTRAINT un_nome_ring UNIQUE (nome_ring);


# Crita tabela tb_host_ring
CREATE TABLE tb_host_ring (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_host INT(11) UNSIGNED,
id_ring INT(11) UNSIGNED,
CONSTRAINT fk_id_ring FOREIGN KEY (id_ring) REFERENCES tb_ring(id),
CONSTRAINT fk_id_host_2 FOREIGN KEY (id_host) REFERENCES tb_hosts(id)
);
