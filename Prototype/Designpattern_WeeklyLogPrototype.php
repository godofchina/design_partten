<?php
interface Cloneable
{
	public function cloneWeeklyLog();
}

class WeeklyLog implements Cloneable
{
	private $date;
	private $content;
	private $author;

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function generateWeeklyLog()
	{
		$log = array(
			'author' => $this->author,
			'date'	 => $this->date,
			'content'=> $this->content
		);

		return $log;
	}

	public function showLog()
	{
		$log = $this->generateWeeklyLog();
		foreach ($log as $key => $value) {
			echo $key . ' : ' .$value . ';<br/>';
		}
	}

	public function cloneWeeklyLog()
	{
		return clone $this;
	}
}

$weeklyLog = new WeeklyLog;
$weeklyLog->setDate("2016-04-15 15:41:11");
$weeklyLog->setAuthor('天才');
$weeklyLog->setContent('明天就放假了哈哈哈哈哈');

$log_a = $weeklyLog->generateWeeklyLog();
$weeklyLog->showLog();

$cloned = $weeklyLog->cloneWeeklyLog();
$cloned->setAuthor('聪明绝顶');
$cloned->generateWeeklyLog();
$cloned->showLog();
