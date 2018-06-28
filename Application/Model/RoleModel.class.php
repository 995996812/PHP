<?php 
namespace Model;
use Think\Model;

class RoleModel extends Model
{
	public function updateRole($auth_id_array,$role_id)
	{
		$auth_ids = implode(',',$auth_id_array);

		$auth=M('auth')->select($auth_ids);

		foreach ($auth as $v) {
			if (empty($v['auth_c']) || empty($v['auth_a'])) { //如果控制器或者方法一个为空就跳出当前循环
				continue; //跳出当前循环
			}
			$array[] = $v['auth_c'].'-'.$v['auth_a'];
		}

		$role_auth_ac = join(',',$array);

		$data['role_id'] = $role_id;
		$data['role_auth_ids'] = $auth_ids;
		$data['role_ac'] = $role_auth_ac;

		return M('role')->save($data);//返回受影响的行数
	}
}

 ?>