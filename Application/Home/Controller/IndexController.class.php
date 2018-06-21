<?php
namespace Home\Controller;
use Think\Controller;
require_once 'GoodsController.class.php';
class IndexController extends Controller {
    public function index(){
       $this->display();
    }

    public function show(){
    	echo "当前请求地址".__SELF__.'<br>'; 
    	echo "当前分组".__MODULE__.'<br>';
    	echo "当前控制器".__CONTROLLER__.'<br>';
    	echo "当前方法".__ACTION__.'<br>';
    } 
}
 


