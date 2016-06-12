<?php
/**
 * 职责链模式：避免请求发送者与接受者耦合在一起，让多个对象都可能接受，
 * 将这些对象连接成一条链，并且沿着这条链传递请求，知道有对象处理它为止。职责链模式是一种对象行为型模式。
 * 优点：使系统在不影响客户端的情况下动态地重新组织链和分配责任
 * 具体类的作用有两个 一是 处理请求 一是 转发请求
 * 职责链模式并不创建职责链，职责链的创建工作必须由系统的其他部分来完成，一般是在使用该职责链的客户端创建职责链。
 */
class PurchaseRequest
{
	private $amount=0.00;
	private $number=0;
	private $purpose;

	public function PurchaseRequest($amount, $number, $purpose) 
	{
		$this->amount = $amount;
		$this->number = $number;
		$this->purpose = $purpose;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function setPurpose($purpose)
	{
		$this->purpose = $purpose;
	}

	public function getPurpose()
	{
		return $this->purpose;
	}
}

abstract class Approver
{
	protected $successor;
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	//set up a supervisor
	public function setSuccessor($successor)
	{
		$this->successor = $successor;
	}

	public abstract function processRequest($request);
}

class Director extends Approver
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function processRequest($request)
	{
		if ( $request->getAmount() < 8000 ) {
			echo $this->name . ' approved this purchaserequest';
		} else {
			$this->successor->processRequest($request);
		}
	}
}

class VicePresident extends Approver
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function processRequest($request)
	{
		if ( $request->getAmount() < 16000 ) {
			echo $this->name . ' approved this purchaserequest';
		} else {
			$this->successor->processRequest($request);
		}
	}
}

class President extends Approver
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function processRequest($request)
	{
		if ( $request->getAmount() < 21000 ) {
			echo $this->name . 'approved this purchaserequest';
		} else {
			$this->successor->processRequest($request);
		}
	}
}

class Congress extends Approver
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function processRequest($request)
	{
		if ( $request->getAmount() < 36000 ) {
			echo $this->name . ' approved this purchaserequest';
		}
	}
}

//instance those roles
$director = new Director('Mr A');
$vicePresident = new VicePresident('Mr B');
$president = new President('Mr shit');
$congress = new Congress('Instituation');

//set up the responsibility chain
$director->setSuccessor($vicePresident);
$vicePresident->setSuccessor($president);
$president->setSuccessor($congress);

//let's purchase something
$purchaseRequest = new PurchaseRequest(25000, '000001', 'Dont tell you');
$director->processRequest($purchaseRequest);