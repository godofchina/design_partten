<?php
/**
 * 装饰器模式
 * 动态地给一个对象增加一些额外的职责，就增加对象功能来说，装饰模式比生成子类更灵活
 * 主要用途 用来扩展系统功能
 */
//组件抽象类
abstract class Component
{
	abstract public function display();
}

//窗口具体实现类
class Window extends Component
{
	public function display()
	{
		echo 'display Window<br\>';
	}
}

//文本框具体实现类
class TextBox extends Component
{
	public function display()
	{
		echo 'display TextBox<br/>';
	}
}

//列表具体实现类
class ListBox extends Component
{
	public function display()
	{
		echo 'display ListBox<br/>';
	}
}

//装饰器
class ComponentDecorator extends Component
{
	protected $component;

	public function __construct(Component $component)
	{
		$this->component = $component;
	}

	public function display()
	{
		$this->component->display();
	}
}

//滚动条实现类
class ScrollBarDecorator extends ComponentDecorator
{
	public function display()
	{
		$this->setScrollBar();
		parent::display();
	}

	protected function setScrollBar()
	{
		echo 'set ScrollBar<br/>';
	}
}

$listBox = new ListBox();
$scrollBarDecorator = new ScrollBarDecorator($listBox);
$scrollBarDecorator->display();