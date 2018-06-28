<?php 
namespace Admin\Controller;
use Think\Controller;

class AuthorityController extends Controller
{
	public function showlist()
	{
		$list = M('auth')->select();
		$this->assign('list',$list);
		$this->display();
	}

	public function updateAuth($auth_id)
	{
		$model = M('auth');

		if ($data=$model->create()) {
			if ($data['auth_pid'] == 0) {

				$data['auth_c']='';
				$data['auth_a']='';
				$data['auth_level']=0;
				$data['auth_path']=$auth_id;
			}else{
				$data['auth_path'] = $data['auth_pid'].'-'.$auth_id;
			}
			$data['auth_id'] = $auth_id; //匹配id
			if ($model->save($data)) {
				$this->redirect('showlist',array(),3,'修改成功');
			}else{
				$this->redirect('showlist',array(),3,'修改失败');
			}
			exit();
		}


		$current_auth = $model->find($auth_id);
		$this->assign('current_auth',$current_auth);
		
		$parent_auth = $model->where("auth_level=0")->select();
		$this->assign('parent_auth',$parent_auth);
		$this->display();
	}
}

 ?>