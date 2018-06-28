<?php 
namespace Admin\Controller;
use Think\Controller;
/**
 * 
 */

class LoginController extends Controller
{
	
	public function login()
	{
		if (IS_POST) {
			/*
			正确写法:
			$obj = new \Think\Verify();

			if ($obj->check(I('post.captcha','','trim'))) {
				
				$this->redirect('Manager/index');
			}else{
				$this->error('验证码错误',U('login'),'4');
			}
			 */
			// 临时的固定写法
			$obj =  I('post.captcha','','trim');
			if ($obj == "1234") {
				$data['mg_name'] = I('post.admin_user');
				$data['mg_pwd'] = I('post.admin_pwd');
				$row = M('manager')->where($data)->find();
				if ($row) {//登录成功(不同角色的管理员显示不同的权限,把用户id保存到会话中)
					session('mg_id',$row['mg_id']); 
					$this->redirect('Manager/index');
				}else{
					$this->error('用户名或密码错误',U('login'),'4');
				}
				
			}else{
				$this->error('验证码错误',U('login'),'4');
			}

		}
		$this->display();
	}
	
	/**
	 * @Author   Jess.Wang
	 * @DateTime 2018-06-25
	 * @describe 验证码图片
	 * @version  [version]
	 * @return   [return]
	 * @return   [type]     [description]
	 */
	public function verifyImg()
	{
		// phpinfo();
		// ob_clean();
		$config =array(
			'imageW' => 120,
			'imageH' => 40,
			'fontSize' => 20,
			'fontttf' => '4.ttf'
		);
		$obj = new \Think\Verify($config);
		var_dump($obj);
		$obj->entry();
	}
}

 ?>