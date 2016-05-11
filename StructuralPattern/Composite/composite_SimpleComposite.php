<?php
/**
 * 复合模式
 * 在复合模式中 单一对象和一组对象 会被同等对待
 * 解决了什么问题
 * 有个容器的概念需要理解
 */
abstract class Component
{
	abstract public function add($component);
	abstract public function remove($component);
	abstract public function getChild($index);
	abstract public function operation();
}

class Leaf extends Component
{
	public function add($component)
	{
		return false;
	}

	public function remove($component)
	{
		return false;
	}

	public function getChild($index)
	{
		return false;
	}

	public function operation()
	{
		echo 'Leaf operation done';
		return true;
	}
}

class Composite extends Component
{
	private $component_list = array(); 
	public function add($component)
	{
		return array_push($this->component_list, $component);
	}

	public function remove($component)
	{
		foreach ($this->component_list as $key => $value) {
			if ( $value == $component )
				unset($this->component_list[$key]);
		}
	}

	public function getChild($index)
	{
		return $this->component_list[$index];
	}

	public function operation()
	{
		foreach ($this->component_list as $key => $value) {
			echo 'operate ' . $key . ' component done';
		}

		return true;
	}
}

$composite = new Composite();
$composite->add('c');
$composite->add('s');
$composite->add('x');
$composite->getChild(1);
$composite->operation();
file_put_contents('1.txt', 'sss' . PHP_EOL . 'aaa');