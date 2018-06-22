<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 
 */
class GoodsController extends Controller
{
	public function showlist()
	{

		$list=M('goods')->select();
		
		$this->assign('list',$list);

		$this->display();
	}


}

 ?>