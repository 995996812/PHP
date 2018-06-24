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
		//1.查询一条数据
		$list=M('goods')->find();
		//2.主键查询(查询主键为2的) 这个查询select()括号中不需要带单引号或者双引号
		$list = M('goods')->select(2);
		//3.查询编号为2,3,4的记录 这个查询select()括号中需要带单引号或者双引号
		$list = M('goods')->select('2,3,4'); 
		// 4.where条件查询
		$list = M('goods')->where("goods_name like '%诺基亚%'")->select();
		$list = M('goods')->where("goods_name like '%诺基亚%' and goods_price >=1000")->select(); 
		// 5. limit查询 limit(5)从前开始取出5条数据 limit(2,5)从第二条开始取出5条数据
		$list = M('goods')->limit(2,5)->select();
		// 6. limit 和 where 查询
		$list = M('goods')->where("goods_name like '%诺基亚%'")->limit(1)->select();
		// 7.排序
		$list=M('goods')->order('goods_price desc')->select();
		// 8.查询指定字段
		$list = M('goods')->field('goods_name,goods_price')->select();
		// 9.分组查询 having
		$list = M('goods')->having('goods_price > 2000')->select();
		$list = M('goods')->group('goods_brand_id')->field('goods_brand_id,max(goods_price) m')->having('m>2000')->select();

		var_dump($list);
		// 10.普通查询,提取出数据库中的所有数据
		$list=M('goods')->select();
		
		$this->assign('list',$list);
		$this->display();
	}
}

 ?>