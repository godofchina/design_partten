<?php
/**
 * 单例模式实现的一个负载均衡器
 * 引用http://blog.csdn.net/lovelion/article/details/7420885
 */
class LoadBalancer
{
	private static $instance;
	private $list=array();

	private function LoadBalancer()
	{
		return $list;
	}

	public static function getLoadBalancer()
	{
		if ( !self::$instance ) {
			self::$instance = new LoadBalancer;
		}
		return self::$instance;
	}

	public function addServer($server)
	{
		array_push($this->list,$server);
		return true;
	}

	public function removeServer()
	{
		array_pop($this->list);
		return true;
	}

	public function getServer()
	{
		return array_rand($this->list);
	}
}

echo '<pre>';
$instance = LoadBalancer::getLoadBalancer();
var_dump($instance);
$instanceA = LoadBalancer::getLoadBalancer();
var_dump($instanceA);
var_dump($instance==$instanceA);
$instance->addServer('A');
$instance->addServer('B');
$instance->addServer('D');
$instance->addServer('E');

echo $instance->getServer();
exit(0);