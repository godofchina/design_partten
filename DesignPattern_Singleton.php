<?php
/**
 * 单例设计模式
 * 确保多次调用只实例化一次
 * 节省资源，确保唯一性
 */
class Singleton
{
	private static $store = null;

	public static function getInstance()
	{
		if ( null == self::$store )
		{
			self::$store = new Singleton;
		}

		return self::$store;
	}
}

$obj =  Singleton::getInstance();

$obj =  Singleton::getInstance();
exit;