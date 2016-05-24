<?php
/**
 * 代理模式
 * 
 * 概念：给某一个对象提供一个代理或占位符，并由代理对象来控制对原对象的访问
 * 代理模式和中介者模式的区别在什么地方？??
 */
//abstract Subject class
abstract class Subject
{
	abstract public function Request();
}

//Proxy concrete class
class Proxy extends Subject
{
	private $realSubject;

	//singleton pattern
	public function __construct()
	{
		$this->realSubject = new RealSubject;
	}

	private function PreRequest()
	{
		echo 'prepare for Request<br/>';
	}

	public function Request()
	{
		$this->PreRequest();
		$this->realSubject->Request();
		$this->PostRequest();
	}

	private function PostRequest()
	{
		echo 'post request<br/>';
	}
}

//realsubject concrete class
class RealSubject extends Subject
{
	public function Request()
	{
		echo 'RealSubject<br/>';
	}
}

//instance a proxy
$proxy = new Proxy;
$proxy->Request();