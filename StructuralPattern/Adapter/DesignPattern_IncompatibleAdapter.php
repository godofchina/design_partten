<?php
/**
 * 不兼容结构的适配器模式
 * @author nj
 */

interface ScoreOperation
{
	public function sort($arr);
	public function search($arr, $key);
}

class OperationAdapter implements ScoreOperation
{
	private $sortObj;
	private $searchObj;

	public function __construct(QuickSort $QuickSort, BinarySearch $BinarySearch)
	{
		$this->sortObj = $QuickSort;
		$this->searchObj = $BinarySearch;
	}

	public function sort($arr)
	{
		return $this->sortObj->sort($arr);
	}

	public function search($arr, $key)
	{
		return $this->searchObj->search($arr, $key);
	}
}

/**
 *
 * 二分查找法
 */
class BinarySearch
{
	public function search($arr, $value)
	{
		
		$low = 0;
		$high = count($arr)-1;
		while ( $low<$high )
		{
			$middle = floor(count($arr)/2);
			if ( $value > $arr[$middle] )
			{
				$low = $middle-1;
			}
			else if ( $value < $arr[$middle] )
			{
				$high = $middle+1;
			}
			else
			{
				return $middle;
			}
		}
	}
}

/**
 * 快速排序法
 */
class QuickSort
{
	public function sort($arr)
	{ 
		return sort($arr)?$arr:false;
	}
}

/*
 * 在这个案例里 QuickSort 和 BinarySearch 充当适配者
 * OperationAdapter 充当适配器
 * ScoreOperation 负责抽象要适配器要实现的方法
 */
$arr = array(3,2,1,0);
$QuickSort = new QuickSort();
$BinarySearch = new BinarySearch();

//实例化适配操作器
$adapter = new OperationAdapter($QuickSort, $BinarySearch);
$res = $adapter->sort($arr);

var_dump($res);exit;