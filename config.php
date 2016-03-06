<?php 
return array(
		'address' => '127.0.0.1:2181', //如果有多个zk addr，eg: host1:2181,host2:2181，The ZooKeeper client library will pick an arbitrary server and try to connect to it. If this connection fails, or if the client becomes disconnected from the server for any reason, the client will automatically try the next server in the list, until a connection is (re-)established.
		'proxyPath' => '/zk/codis/db_test/proxy',
	) ;