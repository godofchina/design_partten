<?php
/*
 * 这里是模仿的java的浅克隆模式（但是PHP面向对象的实现和java不一样所以最终执行结果和java不一致 像下面的执行结果在PHP中是true在java中确实false）
 */
class Attachment
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

	public function download()
	{
		echo '下载文件名为' . $this->name . '的文件';
		// exit;
	}
}

interface Cloneable
{
	public function cloneSelf();
}

class WeeklyLog implements Cloneable
{
	private $attachment;
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function cloneSelf()
	{
		return clone $this;
	}

	public function setAttachment(Attachment $attachment)
	{
		$this->attachment = $attachment;
	}

	public function getAttachment()
	{
		return $this->attachment;
	}
}

$weeklyLog = new WeeklyLog;
$attachment = new Attachment;

// $weeklyLog->setName('king');

$weeklyLog->setAttachment($attachment);
// $weeklyAttachment = $weeklyLog->getAttachment();
// $weeklyAttachment->setName('mine');
// $weeklyAttachment->download();

$cloneWeekly = $weeklyLog->cloneSelf();

var_dump($cloneWeekly == $weeklyLog);

// $weeklyAttachment = $cloneWeekly->getAttachment();
// $weeklyAttachment->download();