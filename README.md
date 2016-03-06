## PCodis 
=======
PHP Codis 操作类

-----

功能：
1. 获取一个可用的CodisProxy
2. 摘除一个不可用的CodisProxy（在连续尝试几次Codis操作仍然失败后，可认为该CodisProxy挂掉了）
