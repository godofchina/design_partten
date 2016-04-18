<?php
interface Prototype
{
	public function aClone();
}

class ConcretePrototype implements Prototype
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

	public function aClone()
	{
		return clone $this;
	}
}


$concrete = new ConcretePrototype;
$concrete->setName('king');
$res = $concrete->aClone();
echo $res->getName();
$res->setName('nj');
echo $res->getName();
echo $concrete->getName();
exit;