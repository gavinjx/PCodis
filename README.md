## PCodis 
=======
PHP Codis 操作类

请确认PHP已经安装Zookeeper扩展，检查方法：php -i|grep zookeeper，如果输出如下内容则证明已经安装成功：

```
Registered save handlers => files user zookeeper redis memcached
zookeeper
zookeeper support => enabled
libzookeeper version => 3.4.7
PWD => /data/www/zookeeper
_SERVER["PWD"] => /data/www/zookeeper
```

若没有安装：

	我们约定所有软件的安装路径为: /data/app

1. Install zookeeper
	* wget http://pecl.php.net/package/zookeeper
	* tar -zxvf zookeeper-3.4.7.tar.gz
	* mv zookeeper-3.4.7 /data/app/
	* ln -s zookeeper-3.4.7 zookeeper
2. Install libzookeeper
    * cd /data/app/zookeeper/src/c
    * ./configure --prefix=/data/app/zookeeper/
    * make && make install
3. Install php extension
	 * cd /data/software
    * wget http://pecl.php.net/get/zookeeper-0.2.2.tgz
    * tar -zxvf zookeeper-0.2.2.tgz
    * cd zookeeper-0.2.2
    * /data/app/php/bin/phpize
    * ./configure --with-php-config=/data/app/php/bin/php-config --with-libzookeeper-dir=/data/app/zookeeper/
    * make && make install
    * vim /data/app/php/etc/php.ini
        * add extension
    * Restart PHP



-----

目录：

| ZookeeperClient.php	```zk操作基类```

| PCodis.php	```定义了几个对CodisProxy节点的操作方法```

| config.php	```配置文件，可以根据实际场景替换掉```

| demo.php ```Demo脚本```

-----

功能：

1. 获取一个可用的CodisProxy

2. 摘除一个不可用的CodisProxy（在连续尝试几次Codis操作仍然失败后，可认为该CodisProxy挂掉了）
