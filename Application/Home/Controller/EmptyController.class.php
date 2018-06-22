<?php 
namespace Home\Controller;
use Think\Controller;

/**
 * 当调用一个不存在的控制器时,系统会自动找到Empty控制器,然后调用EmptyController
 * 的_empty()方法
 */
class EmptyController extends Controller
{
	public function _empty()
	{
		echo "控制器的非法操作";
	}
}

 ?>