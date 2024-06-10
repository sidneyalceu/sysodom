<?php
include("BancoMysql.php");

class VlanDAO {
    
    function VlanDAO(){
        
    }

    function validatag($tagvlan){
        /* tag 1 e normalmente a vlan default 
         * e tag 4096 e 4095 e tag de gerencia.
         */
        $this->tagvlan = $tagvlan;
        if ($this->tagvlan > 1 and $this->tagvlan < 4094){
            return 0;
        } else {
            return 1;
        }
    }
    
    function tagexistente(){
            $this->tagvlan = $tagvlan;
        $this->iphost = $iphost;
        /* Essa função verifica se exite a tag da vlan cadastrada para algum 
         * switch.
         */
        $bancomySQL = new BancoMysql;
        $listiphost = explode(";", $this->iphost);
        foreach ($listiphost as &$ip) {
            $querySelect = "SELECT id FROM tb_vlan_host WHERE tagvlan="."'$this->tagvlan' and iphost="."'$ip'";

            $result = $bancomySQL->executeQuery($querySelect);
            $id = mysqli_fetch_array($result);

            if (!empty($id)){
                $existe = 1;
                $iphost_enco = $ip;
            }
        }

        if ($existe){
            return 1;
        } else {
            return 0;
        }
        //return $this->iphost;
    }
}
