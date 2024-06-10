<?php
    $mapvlan[4097] = array();
   
    $session = new SNMP(SNMP::VERSION_1, "10.7.10.1", "publicaloo");
    $session->valueretrieval = SNMP_VALUE_PLAIN;
    $fulltree = $session->walk(".1.3.6.1.4.1.2011.5.25.42.3.1.1.1.1.2",TRUE);
    for ($x=0; $x<=4097; $x++){
        $mapvlan[$x] = -1;
    }

    $fulltreeid = array_keys($fulltree);
        
    //print_r($fulltree);
  
    //print_r($fulltreeid);

    foreach($fulltreeid as $i => $n){
        $mapvlan[$n] = $fulltreeid[$i];
    }


    for ($x=0; $x<=4097; $x++){
        echo $x.";".$mapvlan[$x]."\n";
    }

    $session->close();
?>