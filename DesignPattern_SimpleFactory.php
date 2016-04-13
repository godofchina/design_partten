<?php
class ProductA
{
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

class ProductB
{
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

class SimpleFactory
{
	public function createProduct($productName)
	{
		switch ($productName) {
			case 'A':
				return new ProductA;
				break;
			case 'B':
				return new ProductB;
				break;
			default:
				return NULL;
				break;
		}
	}
}

$simpleFactory = new SimpleFactory;

$productA = $simpleFactory->createProduct('A');
$productA->setName('李狗蛋');
echo $productA->getName();