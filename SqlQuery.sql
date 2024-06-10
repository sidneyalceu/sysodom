

#Seleciona os host de um determinado anel.
select h.ip from tb_host as h inner join tb_asso_anellogico_host as ah on ah.id_host = h.id where ah.id_anel_logico=4 ;


create database zabbix character set utf8 collate utf8_bin;
create user zabbix@localhost identified by 'zabbix';
grant all privileges on zabbix.* to zabbix@localhost;
quit;