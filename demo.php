<?php
require 'PCodis.php' ;
$config = require 'config.php' ; 

$codis = PCodis::getCodisInstance($config['address'], $config['proxyPath'], $config['retryTime']) ;
if($codis){
	var_dump($codis->get('admin')) ;
}