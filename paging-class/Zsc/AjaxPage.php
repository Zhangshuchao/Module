<?php
/**
* ajax 分页类
* @author zsc
* @time 2015/6/5
*/
namespace Zsc;
class AjaxPage   
{
	private $count;		#总条数
	private $curPage; 	#当前第几页
	private $num;		#没页显示条数
	private $url; 		#回调url
	public $pageNum;	#最多显示的页码数

	public $pageCount;	#总页数
	public $pre; 		#开始位置
	public $nex;		#结束位置
	
	public function __construct($count, $curPage, $num, $url, $pageNum)
	{
		$this->count = $count;
		$this->num = $num;
		$this->url = $url;
		$this->pageNum = $pageNum;

		$this->pageCount = ceil($this->count/$this->num);
		if($curPage < 1) {
			$this->curPage = 1;
		} else if($curPage > $this->pageCount) {
			$this->curPage = $this->pageCount;
		} else {
			$this->curPage = $curPage;
		}

		$this->pre = ($this->curPage-1)*$this->num;
		$this->nex = $this->curPage*$this->num;
	}

	public function linkArray() 
	{
		$htmlArray = array();

		#$pagepre + $pagenex = $pageNum 每页显示的页数
		$pagepre = ceil($this->pageNum/2);			
		$pagenex = $this->pageNum - $pagepre;

		$start = $this->curPage - ($pagepre - 1);
		$end = $this->curPage + $pagenex;

		if($start <1){
			$start = 1;
			$end = $start + ($this->pageNum - 1);
		}

		if($end > $this->pageCount){
			$end = $this->pageCount;
			$start = $this->pageCount - ($this->pageNum - 1);
		}

		 for ($z=$start; $z <= $end; $z++) { 
		 	$htmlArray[$z]['href'] = $this->url . '?page=' . $z;
		 }		

		return $htmlArray;
	}

}
