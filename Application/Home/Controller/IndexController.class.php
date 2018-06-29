<?php
namespace Home\Controller;
use Think\Controller;
require_once 'GoodsController.class.php';
class IndexController extends Controller {
    public function index(){
       $this->display();
    }
    /**
     * @Author   Jess.Wang
     * @DateTime 2018-06-29
     * @describe 注册
     * @version  [version]
     * @return   [return]
     * @return   [type]     [description]
     */
    public function register()
    {
        if (IS_POST) {
            $model = new \Model\UserModel();
            $data = $model->create();

            $data['password'] =md5($data['password']);

            var_dump($data);
        }

        $this->display();
    }

    public function _empty() //调用不存在函数时系统会自动调用这个空函数
    {
    	echo "非法操作....";
    }
}
 


