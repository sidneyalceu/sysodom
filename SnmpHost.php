<?php

class SnmpHost {

	private $instanciaSnmp;
	private $iphost;
	private $snmpcommunity;

   	public $extremeVlanIfIndex = '.1.3.6.1.4.1.1916.1.2.1.2.1.1';
	public $extremeVlanIfDescr = '.1.3.6.1.4.1.1916.1.2.1.2.1.2';
	public $extremeVlanIfVlanId = '.1.3.6.1.4.1.1916.1.2.1.2.1.10';
	public $extremeEapsName = '.1.3.6.1.4.1.1916.1.18.1.1.1';
	public $extremeEapsMbrVlanName = '.1.3.6.1.4.1.1916.1.18.4.1.1';
	public $extremeEapsMbrVlanTag = '.1.3.6.1.4.1.1916.1.18.4.1.3';
	public $hwL2VlanDescr = '.1.3.6.1.4.1.2011.5.25.42.3.1.1.1.1.2';
	public $hwL2VlanName = '.1.3.6.1.4.1.2011.5.25.42.3.1.1.1.1.17';

    public function __construct($iphost, $snmpcommunity) {
		$this->iphost = $iphost;
		$this->snmpcommunity = $snmpcommunity;
		$this->instanciaSnmp = new SNMP(SNMP::VERSION_2c, $iphost, $snmpcommunity);
	}
	
	public function getIphost(){
		$this->iphost;
	}

	public function getSnmpCommunity(){
		$this->snmpcommunity;
	}

	public function setIphost($iphost){
		$this->iphost = $iphost;
	}

	public function setSnmpCommunity($snmpcommunity){
		$this->snmpcommunity = $snmpcommunity;
	}

	public function snmpGetListIndexVlansExOS(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanIndex = $session->walk($this->extremeVlanIfIndex, TRUE);
			
		return $VlanIfVlanIndex;
	}
	
	public function snmpGetTagVlansExOS($index){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanTag = $session->get($this->extremeVlanIfVlanId.".".$index, TRUE);

		return $VlanIfVlanTag;
	}

	public function snmpGetDescrVlansExOS($index){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanDescr = $session->get($this->extremeVlanIfDescr.".".$index, TRUE);

		return $VlanIfVlanDescr;	
	}

	public function snmpGetListIndexVlansVRP(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanIndex = $session->walk($this->hwL2VlanDescr, TRUE);
		$index = array_keys($VlanIfVlanIndex);
	
		return $index;
	}

	public function snmpGetListEAPSNameExOS(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$EapsName = $session->walk($this->extremeEapsName, TRUE);
		
		return $EapsName;
	}

	public function snmpGetListEapsMbrVlanNameExOS(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$EapsVlanName = $session->walk($this->extremeEapsMbrVlanName, TRUE,2);
		$eapsVlanNome = array_values($EapsVlanName);
		
		return $eapsVlanNome;
	}

	public function snmpGetListDescrVlansVRP(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanDescr = $session->walk($this->hwL2VlanDescr, TRUE);
		
		return $VlanIfVlanDescr;
	}

	public function snmpGetListNameVlansVRP(){
		$session = $this->instanciaSnmp;
		$session->valueretrieval = SNMP_VALUE_PLAIN;
		$VlanIfVlanName = $session->walk($this->hwL2VlanName, TRUE);
		
		return $VlanIfVlanName;
	}
}

