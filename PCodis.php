<?php 
require 'ZookeeperClient.php' ;
class PCodis 
{
	private static $_zkConnector ;

	/**
	 * @param [string] $address [e.g. "host1:2181,host2:2181"]
	 * @return [Object ZookeeperClient]
	 */
	private function _getZkConnector($address)
	{
		if(self::$_zkConnector !== null ){
			return self::$_zkConnector ;
		}else{
			return self::$_zkConnector = new ZookeeperClient($address) ;
		}
	}
	/**
	 * Get One CodisProxy Address
	 * @param  [string] $address   [description]
	 * @param  [string] $proxyPath [description]
	 * @return [string]            [CodisProxyAddr, e.g. "127.0.0.1:19000"]
	 */
	public static function selectProxy($address, $proxyPath)
	{
		if(substr($proxyPath, -1) == '/'){ //if the last char is "/" then delete it
			$proxyPath = substr($proxyPath, 0, -1) ;
		}
		$proxyNodes = self::_getZkConnector($address)->getChildren($proxyPath) ;

		if(is_array($proxyNodes)){
			$proxyName = $proxyNodes[rand(0, count($proxyNodes)-1)] ;
			$proxyStr = self::_getZkConnector($address)->get($proxyPath.'/'.$proxyName) ;
			if(strlen($proxyStr)>0 && $proxyInfo = json_decode($proxyStr, true)){
				return $proxyInfo['addr'] ;
			}
		}
		return '' ;
		
	}

	/**
	 * Remove the Node
	 * @param  [string] $address   [description]
	 * @param  [string] $proxyPath [description]
	 * @param  [string] $proxyName [description]
	 * @return [type]            [description]
	 */
	public static function deleteProxy($address, $proxyPath, $proxyName)
	{
		if(substr($proxyPath, -1) == '/'){ //if the last char is "/" then delete it
			$proxyPath = substr($proxyPath, 0, -1) ;
		}
		return self::_getZkConnector($address)->removeNode($proxyPath.'/'.$proxyName) ;
	}

}
