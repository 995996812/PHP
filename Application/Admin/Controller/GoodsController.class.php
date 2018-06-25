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

			$this->redirect('showlist',array(),3,$msg);
		}
		*/
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

	public function update()
	{
		$this->display()  ;
	}

	public function delete()
	{
		$this->display();
	}

}


 ?>