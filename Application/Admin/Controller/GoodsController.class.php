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
	/**
	 * @Author   Jess.Wang
	 * @DateTime 2018-06-25
	 * @describe 添加商品
	 * @version  [version]
	 * @return   [return]
	 */
	public function add()
	{   
		/*方法一:
		if (IS_POST) {
			$data['goods_name'] = $_POST['goods_name'];//商品名称
			$data['goods_category_id'] = $_POST['goods_category_id'];//商品分类
			$data['goods_price'] = $_POST['goods_price'];//商品价格
			$data['goods_introduce'] = $_POST['goods_introduce'];//商品描述
			$data['goods_create_time'] = time();

			$msg = '添加失败';
			if (M('goods')->add($data)) {
				$msg = '添加成功';
			}

			$this->redirect('showlist',array(),3,$msg); //跳转
		}
		
		// 方法二:
		/*
			create的作用:
			1. 将表单元素的值和数据库中的字段一一匹配
			2. 将数据库中没有的字段在数组中去除
			success() 和 error() 是thinkPHP自带的执行成功和失败的方法,可以用此方法来实现跳转
		 */
		/*
		$goods = M('goods');
		if (IS_POST) {
			$data = $goods->create();
			if ($goods->add($data)) {
				$this->success('添加成功','showlist','3');	
			}else{
				$this->error('添加失败');
			}
		}
		 */
		//方法三:
		/*
		I() 函数
		是用来获取 get post session cookie等等的数据
		语法 I('变量的类型',变量名称,[默认值],[过滤方法])
		变量的类型 Get(获取get提交的参数) Post(获取post提交的参数) param(自动判断是get还是post) request(获取request提交的数据) Session(获取会话的数据) Cookie(获取cookie数据) server(类似于$_SERVER[]) globals 获取$GLOBALS参数 path(获取pathinfo模式的url参数)
		 */
		if (IS_POST) {
			if (M('goods')->add(I('post.'))) {
				$this->success('添加成功','showlist','3');
			}else{
				$this->error('添加失败');
			}
		}
		$category=M('category')->select();
		$this->assign('category',$category);

		$this->display();
	}
	/**
	 * @Author   Jess.Wang
	 * @DateTime 2018-06-25
	 * @describe 修改商品
	 * @version  [version]
	 * @return   [return]
	 * @param    string     $goods_id 商品id
	 * @return   [type]               [description]
	 */
	public function update($goods_id='')
	{
		if (IS_POST) {
			$goods = M('goods');
			$data = $goods->create();

			$data['goods_create_time'] = time();
			if ($goods->save($data)) {
				/*
				U方法: 用来生成URL地址,配合URL_MODEL => 0 配置来使用,配置的值不同,配置的URL地址就不一样
				 */
				$this->success('修改成功',U('showlist'),3);
			}else{
				$this->error('修改失败');
			}
			exit;
		}
		$category=M('category')->select();

		$data = M('goods')->find($goods_id);

		$this->assign('category',$category);

		$this->assign('data',$data);

		$this->display();
	}
	/**
	 * @Author   Jess.Wang
	 * @DateTime 2018-06-25
	 * @describe 删除
	 * @version  [version]
	 * @return   [return]
	 * @return   [type]     [description]
	 */
	public function del($goods_id)
	{
		if (M('goods')->delete($goods_id)) {
			$this->success('删除成功',U('showlist',3));
		}else{
			$this->error('删除失败',U('showlist'),3);
		}
	}

}


 ?>