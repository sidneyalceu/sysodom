<?php
include("../model/Anel.php");
include("../model/ConfigAnel.php");
$anel = new Anel("RING-AJU-MCO","Anel que compreende a região de Alagoas e Pernanbuco","VLAN_CTR_ANEL01","10.7.0.1");

$porta1 = 10;
$porta2 = 20;

//$str="RING-AJU-MCO";


$configanel = new ConfigAnel($anel->getNomeanel(),$anel->getDescricaoanel(),$anel->vlancontroelanel,10,20);

//echo $configanel->createConfigeXOS();

$iphost_array = array ('10.7.1.1','10.7.1.4','10.7.4.1','10.7.0.12','10.7.0.38','10.7.0.3','10.7.0.5','10.7.0.7','10.7.0.10','10.7.0.9','10.7.0.21',
    '10.7.0.20','10.7.0.36','10.7.0.37','10.7.0.8','10.7.0.39','10.7.0.11','10.7.0.13','10.7.0.42','10.7.0.40','10.7.2.6','10.7.5.1','10.7.1.18',
    '10.7.5.6','10.7.2.3','10.7.0.14','10.7.0.31','10.7.6.2','10.7.4.2','10.7.5.7','10.7.1.15','10.7.3.3','10.7.5.2','10.7.4.4','10.7.3.4','10.7.3.5'
    ,'10.7.3.6','10.7.5.11','10.7.5.10','10.7.5.9','10.7.7.1','10.7.2.4','10.7.1.20','10.7.1.14','10.7.0.29','10.7.0.28','10.7.0.23','10.7.0.27','10.7.0.25',
    '10.7.0.41','10.7.6.1','10.7.0.19','10.7.0.26','10.7.0.30','10.7.0.33','10.7.1.16','10.7.1.17','10.7.0.1','10.7.5.8','10.7.1.2','10.7.0.24','10.7.3.2','10.7.2.1'
    ,'10.7.3.1','10.7.2.5','10.7.0.4','10.7.5.12','10.7.0.16','10.7.0.18','10.7.2.2','10.7.0.32','10.7.0.22','10.7.1.7','10.7.1.5','10.7.0.17');

$anel_array = array ('Anel01-METRO',
                    'ANEL01-METRO-MCO',
                    'ANEL-ELETROBRAS',
                    'NOVO-ANEL01-METRO-MCO',
                    'NOVO-RING-ALOOSEDE',
                    'RING01-ALtoPE',
                    'RING01-ALtoPE-02',
                    'RING01-PARK-SHOPPING',
                    'RING03-RGOtoRCE',
                    'RING04-ALtoSE',
                    'RING04-ALtoSE-02',
                    'RING06-PEtoCE',
                    'RING07-METRO-FLA',
                    'RING08-PEtoRN-02',
                    'RING08-PEtoRN-JPA',
                    'RING08-PEtoRN-MRO',
                    'RING08-PEtoRN-NTL',
                    'RING09-CEtoSPO-02',
                    'RING10-CEtoRN',
                    'RING10-CEtoRN-02',
                    'RING11-ALOOtoBT-FLA',
                    'RING11-BDGtoMRO',
                    'RING16-ITECtoRCE',
                    'RING16-PTAtoAJU',
                    'RING-AJU-MCO',
                    'RING-AJU-SDR-FLA',
                    'RING-AL-AIRtoPND',
                    'RING-AL-INTERIORES',
                    'RING-AL-INTERIORESviaELETRONET',
                    'RING-AL-JQOtoAIR',
                    'RING-ALOO-NOVA-SEDE',
                    'RING-AL-PNDtoAIR',
                    'RING-CLICK-GOItoFLA',
                    'RING-DWDM-HUAWEI-AIR-02',
                    'RING-DWDM-HUAWEI-AIR-03',
                    'RING-DWDM-PEtoAL',
                    'RING-DWDM-SEtoAL',
                    'RING-EAPS-CABO-TEL-JPA-FLA-RCE',
                    'RING-FIAT-GOIFLA20776',
                    'RING-GLOBAL-DWDM',
                    'RING-GTOLEDO-JPtoITEC-MCO',
                    'RING-INFINERA-TELXIUS',
                    'RING-ITECtoMRO',
                    'RING-ITECtoMRO-BCK',
                    'RING-MPAL-25093',
                    'RING-NHGtoAIR',
                    'RING-NOVO-PINHEIRO-NET',
                    'RING-PIOStoMRO',
                    'RING-PROVISORIO-PPI',
                    'RING-PTGtoRCE',
                    'RING-RCEtoGOI',
                    'RING-TCWEBNET-AIRtoSMM',
                    'RING-TJAL',
                    'RING-TSQtoMRO',
                    'TELEBRAS-JPAMCO24859');
$oid_snmp_eaps = '1.3.6.1.4.1.1916.1.18.1.1.1.';

/* for ($i = 0, $j = strlen($str); $i < $j; $i++) {
    $dec_array[] = ord($str{$i});
}

echo "1.3.6.1.4.1.1916.1.18.1.1.1.".strlen($str).".";
foreach ( $dec_array as $dec_value){
    echo $dec_value.".";
}
*/
$oid_snmp = "";

echo "<BR>";

foreach ($anel_array as $anel){
    for ($i = 0, $j = strlen($anel); $i < $j; $i++) {
        $anel_dec[] = ord($anel{$i});
        //echo "<br>".$str{$i};
    }
    for($x = 0, $y = count($anel_dec); $x < $y; $x++){
        //echo $anel_dec[$x];
        $oid_snmp = $oid_snmp.$anel_dec[$x];
       
        if ($x < $y-1){
            $oid_snmp = $oid_snmp.".";
        }
        //echo $anel." =  ".$oid_snmp."<br>";
    }
    //echo '<br>';
    //echo $anel;
    echo '<br>';
    $iod = ".".$oid_snmp_eaps.strlen($anel).".".$oid_snmp;
    echo $iod,"\n";
    $oid_snmp="";
    unset ($anel_dec);
    
    /*foreach($iphost_array as $iphost){
        $session = new SNMP(SNMP::VERSION_2c, $iphost, "publicaloo");
        $session->valueretrieval = SNMP_VALUE_PLAIN;
        
       // $get_value = $session->get($oid,TRUE);
        echo $get_value;
        //$session->getErrno();
    }*/
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

