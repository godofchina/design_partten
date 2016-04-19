<?php
interface OfficialDocument
{
	public function cloneSelf();
	public function display();
}

//Feasibility Analysis Report
class FAR implements OfficialDocument
{
	public function cloneSelf()
	{
		return clone $this;
	}

	public function display()
	{
		echo 'FAR';
	}
}

//Software Requirements Specification
class SRS implements OfficialDocument
{
	public function cloneSelf()
	{
		return clone $this;
	}

	public function display()
	{
		echo 'SRS';
	}
}

class PrototypeManager
{
	private $Hashtable;
	private static $PrototypeManager;

	public function PrototypeManage()
	{
		$this->Hashtable['far'] = new FAR;
		$this->Hashtable['srs'] = new SRS;
	}

	public function addOfficalDocument($key, OfficialDocument $doc)
	{	
		$this->Hashtable[$key] = $doc;
	}

	public function getOfficialDocument($key)
	{
		return $this->Hashtable[$key]?($this->Hashtable[$key]->cloneSelf()):false;
	}

	public static function getPrototypeManager()
	{
		if ( !self::$PrototypeManager )
			self::$PrototypeManager = new PrototypeManager;
		return self::$PrototypeManager;
	}
}

//instance a PrototypeManager
$PrototypeManager = PrototypeManager::getPrototypeManager();

//instance four official documents
$PrototypeManager->PrototypeManage();

$doc1 = $PrototypeManager->getOfficialDocument('far');
$doc1->display();

$doc2 = $PrototypeManager->getOfficialDocument('srs');
$doc2->display();
