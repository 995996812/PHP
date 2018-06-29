<?php 
namespace Components;
use Think\Controller;

class AdminController extends Controller
{
	
	public function __construct(){
		parent::__construct();
		//禁止越权访问,当会话过期的时候,跳到登录页面
		$mg_id = session('mg_id');
		// echo $mg_id;
		if (empty($mg_id)) {
			echo '<script type="text/javascript">'; 
			echo 'window.top.location.href="/index.php/Admin/Login/login"'; //使用主窗口打开登录页面,在最上面的框架打开
			echo '</script>';
			exit();
		}
		//防止翻墙访问
		$controller =  strtolower(CONTROLLER_NAME);
		$all_allow_controller_array = array('login','manager');
		if (!in_array($controller, $all_allow_controller_array)) { //不在直接允许访问的控制器范围内
			$now_ac = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);

			$manager = M('manager')->find($mg_id); //当前用户

			$role = M('role')->find($manager['mg_role_id']); //当前用户对应的角色

			$role_auth_ac = $role['role_ac']; //当前角色允许访问的地址
			if (stripos($role_auth_ac, $now_ac) === false) {
				die('没有此权限');
			}
		}
	}
}
 ?>