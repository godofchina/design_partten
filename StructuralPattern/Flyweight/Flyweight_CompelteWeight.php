<?php
/**
 * 较为完整的享元设计模式 案例
 * 
 * 假设公司现在要开发一款围棋游戏，围棋中的棋子有黑白两种，除了位置不一样以外别的大部分都相同，
 * 如果每个棋子都需要实例化一个对象，消耗内存太大，所以我们用享元模式来设计游戏的棋子
 */
//坐标类
class Coordinates {
	private $x;
	private $y;

	public function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function setX($x)
	{
		$this->x = $x;
	}

	public function setY($y)
	{
		$this->y = $y;
	}

	public function getX()
	{
		return $this->x;
	}

	public function getY()
	{
		return $this->y;
	}
}

//棋子制造工厂
class IgoChessmanFactory
{
	private $IgoChessmanFactory;
	private $hashTable;

	
}
