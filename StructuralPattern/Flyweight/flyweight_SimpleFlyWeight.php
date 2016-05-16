<?php
/**
 * 享元模式
 * 运用共享技术有效大量支持细颗粒度对象的复用。系统只使用少量的对象，而这些对象都很相似，
 * 状态变化很小，可以实现对象的多次复用。由于享元模式要求共享的对象必须是细颗粒度对象，
 * 因此它又被成为轻量级模式,它是一种对象结构型模式
 * 在享元模式中存贮共享实例对象的地方称为享元池
 * 享元对象能做到共享的关键是区分了内部状态和外部状态
 * 内部状态是存贮在享元对象的内部不会随环境改变的状态，内部状态可以共享
 * 外部状态相反，随环境改变 不能共享
 * 没看懂这个例子
 */
//享元工厂
class FlyweightFactory
{
	private $flyweights = array(); //享元池

	public function getFlyweight($key)
	{
		if( isset($flyweights[$key]) ) {
			return $flyweights[$key];
		 } else {
		 	$flyweight = new ContreteFlyweight();
		 	$this->flyweights[$key] = $flyweight;
			return $flyweight;
		}
	}
}

//抽象享元类
abstract class Flyweight
{
	protected $intrinsicState;

	public function __construct($intrinsicState)
	{
		$this->intrinsicState = $intrinsicState;
	}

	abstract public function operation($extrinsicState);
}

//具体享元类
class ConcreteFlyweight extends Flyweight
{
	public function operation($extrinsicState)
	{
		echo 'intrinsicState is ' . $this->intrinsicState . '  extrinsicState is ' . $extrinsicState;
	}
}

//具体非共享享元类
class UnsharedConcreteFlyweight
{
	private $extrinsicState;

	public function operation($extrinsicState)
	{
		echo $this->extrinsicState;
	}
}