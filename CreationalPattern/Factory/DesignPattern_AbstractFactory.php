<?php
//加注释啊
abstract class Button
{
	abstract public function createButton();
}

class ButtonRed extends Button
{
	public function createButton()
	{
		$button = '<button style="background:red;">RedButton</button>';
		return $button;
	}
}

class ButtonBlue extends Button
{
	public function createButton()
	{
		$button = '<button style="background:blue;">BlueButton</button>';
		return $button;
	}
}

abstract class Input
{
	abstract public function createInput();
}

class InputRed extends Input
{
	public function createInput()
	{
		$radio = '<input type="text" style="border-style: solid;border-color: red;"/>';
		return $radio;
	}
}

class InputBlue extends Input
{
	public function createInput()
	{
		$radio = '<input type="text" style="border-style: solid;border-color: blue;"/>';
		return $radio;
	}
}

interface Factory
{
	public function createButton();
	public function createInput();
}

class RedFactory implements Factory
{
	public function createButton()
	{
		$button = new ButtonRed;
		return $button->createButton();
	}

	public function createInput()
	{
		$input = new InputRed;
		return $input->createInput();
	}
}

class BlueFactory implements Factory
{
	public function createButton()
	{
		$button = new ButtonBlue;
		return $button->createButton();
	}

	public function createInput()
	{
		$input = new InputBlue;
		return $input->createInput();
	}
}

$RedFactory = new RedFactory;
echo $RedFactory->createButton();
echo $RedFactory->createInput();

$BlueFactory = new BlueFactory;
echo $BlueFactory->createInput();
echo $BlueFactory->createButton();
exit;