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
		//数据分页
		$model = M('goods'); //获取数据
		$recordcount = $model->count(); //总记录数
		$page = new \Think\Page($recordcount,5); //$recordcount 为总数据条数  10位每页显示的数据条数
		
		//基础自定义分页样式
		/*$page->lastSuffix = false;
		$page->rollPage = 3;
		$page->setConfig('prev','【上一页】');
		$page->setConfig('next','【下一页】');
		$page->setConfig('first','【首页】');
		$page->setConfig('last','【末页】');*/
		//完全自定义分页样式
		$page->setConfig('theme','共 %TOTAL_ROW% 条记录,当前是%NOW_PAGE%/%TOTAL_PAGE% %FIRST% %UP_PAGE% %DOWN_PAGE% %END%');
		$page->setConfig('prev','【上一页】');
		$page->setConfig('next','【下一页】');
		// $list=M('goods')->select();
		$startno = $page->firstRow; //起始行数
		$pagesize = $page->listRows; //显示的数据条数
		$list = $model->limit($startno,$pagesize)->select();
		$pagestr = $page->show(); //分页指示器显示

		$this->assign('list',$list);
		$this->assign('pagestr',$pagestr); 
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
		//方法一:
		/*if (IS_POST) {
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
		}*/
		 //上传图片:
		 $goods = M('goods');
		 if (IS_POST) {
		 	if ($data = $goods->create()) {
		 		if ($_FILES['goods_image']['error'] == 0) {
		 			$upload = new \Think\Upload();
		 			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
		 			$upload->rootPath  =     './Application/Public/uploads/'; // 设置附件上传根目录
		 			$info   =   $upload->uploadOne($_FILES['goods_image']);

    				if(!$info) {// 上传错误提示错误信息
        				$this->error($upload->getError());
    				}else{// 上传成功 获取上传文件信息  保存到数据库
         				$big = $info['savepath'].$info['savename'];
         				$data['goods_image'] = $info['savepath'].$info['savename'];
         				//生成缩略图
         				$img = new \Think\Image();
         				//1.打开图片
         				$big_image = $upload->rootPath.$data['goods_image'];//查找文件路径
         				$img->open($big_image);
         				//2.生成缩略图
         				$img->thumb(100,150,2); //等比生成缩略图
         				//3.保存
         				$samall_img = $upload->rootPath.$info['savepath'].'small_'.$info['savename'];
         				$img->save($samall_img);
         				$data['goods_small_image'] = $info['savepath'].'small_'.$info['savename'];
         				$data['goods_create_time'] = time();
    				}
		 		}
		 		if ($goods->add($data)) {
		 			$this->success('添加成功','showlist','3');
		 		}else{
		 			$this->error('添加失败');
		 		}
		 	}
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
		// if (IS_POST) {
		// 	if (M('goods')->add(I('post.'))) {
		// 		// $this->success('添加成功','showlist','3');
		// 	}else{
		// 		// $this->error('添加失败');
		// 	}
		// }
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

	public function send()
	{
		$obj = new \Components\EmailTool;
		$obj->send();
	}

}


 ?>