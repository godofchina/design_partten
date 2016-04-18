<?php
//饿汉单例模式 (php 语法不支持 在属性初始化的时候 new类 所以下面的程序执行会报错)
class LoadBalancer
{
	private static final $instance = new LoadBalancer;

	public function eagerSingleton()
	{

	}
	public static function getInstance()
	{
		return self::$instance;
	}
}

$loadBalancer = LoadBalancer::getInstance();
var_dump($loadBalancer);
exit(0);
