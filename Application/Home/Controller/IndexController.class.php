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

            var_dump($data);
        }

        $this->display();
    }
    //用户名校验
    function checkNM($name){

        $info = D('user')->where("username='$name'")->find();

        if ($info) {
            echo "<span style='color:red'>用户名已经存在</span>";
        } else {
            echo "<span style='color:green'>用户名可以使用</span>";
        }
        

        exit();
    }

    public function _empty() //调用不存在函数时系统会自动调用这个空函数
    {
    	echo "非法操作....";
    }
}
 


