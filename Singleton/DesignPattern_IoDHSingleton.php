<?php
//php面向对象就是模仿java 但是又没有全部实现
class Singleton
{
	private static function HolderClass()
	{
		return new Singleton;
	}

	public static function getInstance()
	{
		return self::HolderClass();
	}
}

$instance = Singleton::getInstance();
var_dump($instance);
exit;