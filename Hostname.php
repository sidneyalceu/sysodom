<?php
class Hostname {
    private $id = null;
    private $hostname;
    private $ip;
    
    public function __construct() {

    }
    
    public function getId() {
        return $this->id;
    }
    public function getIp() {
        return $this->ip;
    }
    public function getHostname() {
       return $this->hostname;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setIp($ip) {
        $this->ip = $ip;
    }
    public function setHostnome($hostname) {
        $this->hostname = $hostname;
    }
}
?>