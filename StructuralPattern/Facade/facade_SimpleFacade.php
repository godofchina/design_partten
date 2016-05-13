<?php
/**
 * 简单外观模式设计
 * 降低复杂的系统交互，增加一个中间类来供客户端调用
 * 外观模式中,一个子系统的外部与内部的通信通过一个统一的外观类进行,外观类将客户端与复杂的内部系统隔离,使得客户类只需要与外观角色打交道,而不需要与子系统内部的许多对象打交道
 */
class Food
{
	public function applyFood()
	{
		echo '饭来了！<br/>';
	}
}

class Pay
{
	public function payMoney()
	{
		echo '收钱！<br/>';
	}
}

class Water
{
	public function applyWater()
	{
		echo '水来了！<br/>';
	}
}

class Waiter
{
	private $water;
	private $food;
	private $pay;

	public function __construct()
	{
		$this->water = new Water;
		$this->food  = new Food;
		$this->pay   = new Pay;
	}

	public function serveMe()
	{
		$this->water->applyWater();
		$this->food->applyFood();
		$this->pay->payMoney();
	}
}

$waiter = new Waiter();
$waiter->serveMe();