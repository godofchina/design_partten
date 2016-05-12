<?php
/**
 * 复合模式
 * 组合多个对象形成树形结构以表示具有"整体-部分"关系的层次结构。
 * 组合模式对单个对象(即叶子对象)和组合对象的使用具有一致性,组合模式又可以成为"整体-部分"part-whole模式,它是一种对象结构型模式。
 * 在复合模式中 单一对象和一组对象 会被同等对待
 * 
 */
//组件类 抽象
abstract class Component
{
	abstract public function add($component);
	abstract public function remove($component);
	abstract public function getChild($index);
	abstract public function operation();
}

//叶节点类
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
//复合容器类
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
		echo 'operate components done';
		foreach ($this->component_list as $key => $value) {
			$this->operation();
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
// file_put_contents('1.txt', 'sss' . PHP_EOL . 'aaa');