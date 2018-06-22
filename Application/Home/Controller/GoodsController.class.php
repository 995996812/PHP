<?php 
namespace Home\Controller;
use Think\Controller;
/**
 * 
 */
class GoodsController extends Controller
{
	
	public function index()
	{
		# code...
		$this->display();
	}

	public function show()
	{
		# code...
		$this->assign('score',88);
		$this->display();
	}


}

 ?>