<?php
//游戏角色构造器 使用建造者模式的完整实现
class Actor
{
	private $sex;
	private $type;
	private $face;
	private $costume;
	private $hairstyle;

	public function setType($type)
	{
		$this->type = $type;
	}

	public function getType()
	{
		return $this->type;
	}
}

Abstract class ActorBuilder
{
	protected $actor;

	public function __construct()
	{
		$this->actor = new Actor;
	}

	Abstract public function buildType();

	public function createActor()
	{
		return $this->actor;
	}
}

class AngelBuilder extends ActorBuilder
{
	public function buildType()
	{
		$this->actor->setType('天使');
	}
}

class DevilBuilder extends ActorBuilder
{
	public function buildType()
	{
		$this->actor->setType('恶魔');
	}
}

class ActorController
{
	public function construct(ActorBuilder $ActorBuilder)
	{
		$ActorBuilder->buildType();
		return $ActorBuilder->createActor();
	}
}

//有些复杂 写下大概思路
/**
 * Actor 演员类(具体类)
 * ActorBuilder 构造演员类(抽象类) 通过这个类造出的演员 
 * AngelBuilder 构造天使演员类(具体类) 继承自ActorBuilder
 * Actorcontroller 导演(具体类) 和AngelBuilder藕合
 *
 */
$director = new ActorController;
$angelBuilder = new AngelBuilder;

echo $director->construct($angelBuilder)->getType();

$DevilBuilder = new DevilBuilder;
echo $director->construct($DevilBuilder)->getType();
