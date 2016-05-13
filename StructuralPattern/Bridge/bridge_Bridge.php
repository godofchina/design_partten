<?php
/**
 * 桥接模式
 * 
 * 这个例子举得不太好
 */
abstract class BridgeBook 
{
	private $author;
	private $title;
	private $showType;

	public function __construct($author, $title, $showType)
	{
		$this->author = $author;
		$this->title = $title;

		if( 'cap' == $showType )
			$this->showType = new CapBook();
		else
			$this->showType = new StarBook();
	}

	public function showAuthor()
	{
		return $this->showType->showAuthor($this->author);
	}

	public function showTitle()
	{
		return $this->showType->showTitle($this->title);
	}
}

class BridgeAuthorTitleBook extends BridgeBook
{
	public function showAuthorTitle()
	{
		echo $this->showAuthor() . "\'s " . $this->showTitle();
	}
}

class BridgeTitleAuthorBook extends BridgeBook
{
	public function showTitleAuthor()
	{
		echo $this->showTitle() . " of " . $this->showAuthor();
	}
}


abstract class Book
{
	abstract function showAuthor($author);
	abstract function showTitle($title);
}

class CapBook extends Book
{
	public function showAuthor($author)
	{
		return ucwords($author);
	}

	public function showTitle($title)
	{
		return ucwords($title);
	}
}

class StarBook extends Book
{
	public function showAuthor($author)
	{
		return '**' . $author . '**';
	}

	public function showTitle($title)
	{
		return '**' . $title . '**';
	}
}

$titleAuthor = new BridgeTitleAuthorBook('ningjin', 'programming', 'cap');
$titleAuthor->showTitleAuthor();