<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * ThinkPHP关于SQL的一些操作
 */
class RecordController extends Controller
{
	public function index()
	{
		//1.查询一条数据
		// $list=M('goods')->find();
		// //2.主键查询(查询主键为2的) 这个查询select()括号中不需要带单引号或者双引号
		// $list = M('goods')->select(2);
		// //3.查询编号为2,3,4的记录 这个查询select()括号中需要带单引号或者双引号
		// $list = M('goods')->select('2,3,4'); 
		// // 4.where条件查询
		// $list = M('goods')->where("goods_name like '%诺基亚%'")->select();
		// $list = M('goods')->where("goods_name like '%诺基亚%' and goods_price >=1000")->select(); 
		// // 5. limit查询 limit(5)从前开始取出5条数据 limit(2,5)从第二条开始取出5条数据
		// $list = M('goods')->limit(2,5)->select();
		// // 6. limit 和 where 查询
		// $list = M('goods')->where("goods_name like '%诺基亚%'")->limit(1)->select();
		// // 7.排序
		// $list=M('goods')->order('goods_price desc')->select();
		// // 8.查询指定字段
		// $list = M('goods')->field('goods_name,goods_price')->select();
		// // 9.分组查询 having
		// $list = M('goods')->having('goods_price > 2000')->select();
		// $list = M('goods')->group('goods_brand_id')->field('goods_brand_id,max(goods_price) m')->having('m>2000')->select();

		// var_dump($list);
		// // 10.普通查询,提取出数据库中的所有数据
		$list=M('goods')->select();
		
		$this->assign('list',$list);
		$this->display('showlist');
		// 
		// $this->dynamic();
		// $this->test2();
		// $this->changeData();
		// $this->querySteate();
	}
	
	/**
	 * 动态查询
	 * @return [type] [description]
	 */
	public function dynamic()
	{
		$list = M('goods')->getBygoods_id(1);

		var_dump($list);
	}
	/**
	 * 聚合函数
	 * @return [type] [description]
	 */
	public function test2()
	{
		# code...
		$list = M('goods');
		echo $list->count().'<br>'; //数据总条数
		echo $list->max('goods_price').'<br>'; //最大
		echo $list->min('goods_price').'<br>'; //最小
		echo $list->avg('goods_price').'<br>'; //平均值
		echo $list->sum('goods_price').'<br>'; //和
	}
	/**
	 * @Author   Jess.Wang
	 * @DateTime 2018-06-24
	 * @describe 添加数据
	 * @version  [version]
	 * @return   [return]
	 */
	public function addData()
	{
		// $data = array(
		// 	'goods_name'=>'手机',
		// 	'goods_price'=>2300
		// );
		// //如果主键是自动增长,则返回自动增长的编号,否则返回受影响的记录数,如果SQL语句有错误,则返回false
		// echo M('goods')->add($data);
		
		$goods = M('goods');
		$goods->goods_name='电视';
		$goods->goods_price='20000';
		echo $goods->add(); //返回值和上面是一样的
	}
	/**
	 * 数据修改
	 * @return [type] [description]
	 */
	public function changeData()
	{
		$data =array(
			'goods_name'=>'手机22',
			'goods_price'=>1000,
			'goods_id'=>'9'
		);

		echo M('goods')->save($data);
	}
	/**
	 * 使用SQL语句进行访问
	 * @return [type] [description]
	 */
	public function querySteate()
	{
		# code...
		# 查询 用query
		$data = M()->query('select *from tab_goods');
		var_dump($data);
		#增删改 用execute
		$data =M()->execute('delete *form tab_goods where goods_id=8');
	}
}


 ?>