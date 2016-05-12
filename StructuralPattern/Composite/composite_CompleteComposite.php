<?php
/**
 * 假设现在要设计一个杀毒软件，针对每种文件杀毒
 * 要对文件夹,不同类型的文件进行杀毒,可以使用组合模式来组织这些类
 * 把文件夹和文件都当成整体的一部分同等处理 整体-部分结构
 */
//抽象文件类
abstract class AbstractFile
{
	abstract public function add($file);
	abstract public function remove($file);
	abstract public function getChild($i);
	abstract public function killVirus();
}

//图像文件类 叶子构件
class IMageFile extends AbstractFile
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function add($file)
	{
		//抛出一个人为定义的异常
		echo $this->name . ' 无此项操作';
	}

	public function remove($file)
	{
		echo $this->name . ' 无此项操作';
	}

	public function getChild($i)
	{
		echo $this->name . ' 无此项操作';
	}

	public function killVirus()
	{
		echo $this->name . ' killVirus successful<br/>';
	}
}

//文本文件类：叶子构件
class TextFile extends AbstractFile
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function add($file)
	{
		//抛出一个人为定义的异常
		echo $this->name . ' 无此项操作';
	}

	public function remove($file)
	{
		echo $this->name . ' 无此项操作';
	}

	public function getChild($i)
	{
		echo $this->name . ' 无此项操作';
	}

	public function killVirus()
	{
		echo $this->name . ' killVirus successful<br/>';
	}
}

//文件夹类：容器类
class Folder extends AbstractFile
{
	private $file_list = array();
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function add($file)
	{
		array_push($this->file_list, $file);
	}

	public function remove($file)
	{
		foreach ($this->file_list as $key => $value) {
			if($file == $value)
				unset($this->file_list[$key]);
		}
	}

	public function getChild($index)
	{
		return $this->file_list[$index];
	}

	public function killVirus()
	{
		echo $this->name . 'killVirus succesful<br/>';
		foreach ($this->file_list as $key => $value) {
			$value->killVirus();
		}
	}
}

$folder1 = new Folder('我的文件夹');
$folder2 = new Folder('图片文件夹');
$folder3 = new Folder('文本文件夹');

$img1 = new ImageFile('树莓派.jpg');
$img2 = new ImageFile('香蕉派.jpg');

$text1 = new TextFile('王小波的散文');
$text2 = new TextFile('贾平凹的长篇小说');

$folder2->add($img1);
$folder2->add($img2);

$folder3->add($text1);
$folder3->add($text2);

$folder1->add($folder2);
$folder1->add($folder3);

//开始杀毒
$folder1->killVirus();