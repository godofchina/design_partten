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
	private static $IgoChessmanFactory;
	private static $hashTable = array();

	public function __construct()
	{
		$whiteIgoChess = new WhiteChessman;
		self::$hashTable['w'] = $whiteIgoChess;
		$blackIgoChess = new BlackChessman;
		self::$hashTable['b'] = $blackIgoChess;
	}

	//单例模式
	public static function getInstance()
	{
		if ( !self::$IgoChessmanFactory )
			self::$IgoChessmanFactory = new IgoChessmanFactory;
		return self::$IgoChessmanFactory;
	}

	//生产棋子
	public function getIgoChessman($color)
	{
		return self::$hashTable[$color];
	}
}

//棋子类 抽象
abstract class IgoChessman
{
	abstract public function getColor();	//棋子颜色
	//渲染棋子
	public function display(Coordinates $Coordinates)
	{
		echo '棋子颜色' . $this->getColor() . '，位置x：' . $Coordinates->getX() . '，位置y：' . $Coordinates->getY() ;
	}
}

//白色棋子 具体类
class WhiteChessman extends IgoChessman
{
	public function getColor()
	{
		return '白色';
	}
}

class BlackChessman extends IgoChessman
{
	public function getColor()
	{
		return '黑色';
	}
}

//实例化工厂
$IgoChessmanFactory = IgoChessmanFactory::getInstance();

//生产白色棋子
$WhiteChessman = $IgoChessmanFactory->getIgoChessman('w');
$WhiteChessman->display(new Coordinates('1','2'));

$WhiteChessmana = $IgoChessmanFactory->getIgoChessman('w');
$WhiteChessmana->display(new Coordinates('1','2'));

echo '<p>';

//生产黑色棋子
$BlackChessman = $IgoChessmanFactory->getIgoChessman('b');
$BlackChessman->display(new Coordinates('5','6'));
