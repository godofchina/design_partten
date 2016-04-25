<?php
/**
 * 不兼容结构的适配器模式
 * @author nj
 */

interface ScoreOperation
{
	public function sort();
	public function search();
}

class OperationAdapter implements ScoreOperation
{
	private $sortObj;
	private $searchObj;

	public function OperationAdapter()
	{
		$this->sortObj = new QuickSort;
		$this->searchObj = new BinarySearch;
	}

	public function sort($arr)
	{
		$this->sortObj->sort($arr);
	}

	public function search($arr, $key)
	{
		$this->searchObj->search($arr, $key);
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
		return sort($arr);
	}
}