<?php
require 'PCodis.php' ;
$config = require 'config.php' ; 

$proxy = PCodis::selectProxy($config['address'], $config['proxyPath']) ;

if(strlen($proxy)>0){
	$addr = explode(':', $proxy) ;
	$redis = new Redis();
	$redis->connect($addr[0], $addr[1]);
	var_dump($redis->get('admin')) ;

	if(PCodis::deleteProxy($config['address'], '/test/', 'admin')==true){
		echo "delete success\n" ;
	}else{
		echo "delete failed\n" ;
	}
}else{
	var_dump($proxy) ;
}
