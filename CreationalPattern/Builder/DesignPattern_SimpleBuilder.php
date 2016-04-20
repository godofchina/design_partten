<?php
/**
 * 建造者模式
 */
class Product
{
	private $partA;
	private $partB;
	private $partC;

	public function setPartA()
	{
		echo '组装partA<p>';
		$this->partA = true;
	}

	public function setPartB()
	{
		echo '组装partB<p>';
		$this->partB = true;
	}

	public function setPartC()
	{
		echo '组装partC<p>';
		$this->partC = true;
	}
}

//问题1 抽象类里的构造函数 传递obj类型的数据 __construct(Product $product) 语法不通过
Abstract class Builder
{
	protected $product;
	
	public function __construct()
	{
		$this->product = new Product;
	}

	public Abstract function buildPartA();
	public Abstract function buildPartB();
	public Abstract function buildPartC();

	public function getResult()
	{
		return $this->product;
	}
}

class ConcreteBuilder extends Builder
{
	public function buildPartA()
	{
		$this->product->setPartA();
	}

	public function buildPartB()
	{
		$this->product->setPartB();
	}

	public function buildPartC()
	{
		$this->product->setPartC();
	}
}

class Director
{
	private $builder;

	public function setBuilder(ConcreteBuilder $builder)
	{
		$this->builder = $builder;
	}

	public function construct()
	{
		$this->builder->buildPartA();
		return $this->builder->getResult();
	}
}

$concreteBuilder = new ConcreteBuilder;
$director = new Director;

$director->setBuilder($concreteBuilder);
$product = $director->construct();
var_dump($product);exit;